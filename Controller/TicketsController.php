<?php
/**
 * Tickets Controller
 *
 * Sets the variables to send to ticket views.
 *
 * PHP versions 5
 *
 * Zuha(tm) : Business Management Applications (http://zuha.com)
 * Copyright 2009-2010, Zuha Foundation Inc. (http://zuha.org)
 *
 * Licensed under GPL v3 License
 * Must retain the above copyright notice and release modifications publicly.
 *
 * @copyright     Copyright 2009-2010, Zuha Foundation Inc. (http://zuha.com)
 * @link          http://zuha.com Zuha™ Project
 * @package       zuha
 * @subpackage    zuha.app.plugins.tickets.controllers
 * @since         Zuha(tm) v 0.0.1
 * @license       GPL v3 License (http://www.gnu.org/licenses/gpl.html) and Future Versions
 * @todo		  Clean up and move most logic to the model.
 */
class TicketsController extends TicketsAppController {

	public $name = 'Tickets';
	public $uses = 'Tickets.Ticket';

	function index() {
		$this->paginate = array(
			'conditions' => array(
				# only show tickets for the logged in user
				'Ticket.creator_id' => $this->Session->read('Auth.User.id'),
				'Ticket.parent_id' => null
				),
			'contain' => array(
				'TicketDepartment',
				'Contact',
				'Creator',
				)
			);
		$this->set('tickets', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Ticket.', true));
			$this->redirect(array('action'=>'index'));
		} 
		
		$this->Ticket->TicketDepartment->bindModel(array(
			'hasMany' => array(
				'TicketDepartmentsAssignee' => array(
					'foreignKey' => 'enumeration_id'
					)
				)			
			));
		
		$this->Ticket->TicketDepartment->TicketDepartmentsAssignee->bindModel(array(
			'belongsTo' => array(
				'User' => array(
					'foreignKey' => 'user_id'
					)
				)			
			));

		$ticket = $this->Ticket->find('first', array(
			'conditions' => array(
				'Ticket.id' => $id
				),
			'contain' => array(
				'Contact',
				'TicketDepartment' => array(
					'TicketDepartmentsAssignee' => array(
						'User',
						),
					),
				),
			));		
		$this->set(compact('ticket'));
		
		if (!empty($this->request->params['named']['archive'])) {
			$conditions['Ticket.lft >='] = $ticket['Ticket']['lft'];
			$conditions['Ticket.rght <='] = $ticket['Ticket']['rght'];
		} else {
			#$conditions['Ticket.archive'] = null;
			$conditions['Ticket.lft >='] = $ticket['Ticket']['lft'];
			$conditions['Ticket.rght <='] = $ticket['Ticket']['rght'];
		}
		
  		$someTickets = $this->Ticket->find('threaded', array(
			'conditions' => $conditions,
			'order' => array(
				'Ticket.created DESC',
				),
			'contain' => array(
				'Creator',
				'TicketDepartment',
				)
			)
		);
		$this->set('ticketTree', $someTickets);
	}

	function edit() {	
		if (empty($this->request->params['url']['ticket_department_id'])) {
			# showing the first part of a two part form
			$ticketDepartments = $this->Ticket->TicketDepartment->find('list', array('conditions' => array('TicketDepartment.type' => 'TICKETDEPARTMENT')));
			$this->set(compact('ticketDepartments'));
		} else {
			# showing the second part of the two part form
			if (empty($this->request->data)) {
				echo 'this needs to be fixed to work with the forms plugin';
			}
		}
		
		if (!empty($this->request->data)) {
			if ($this->Ticket->save($this->request->data)) {
				$this->Session->setFlash(__('The Ticket has been saved', true));
				$this->redirect(array('action'=>'view', $this->Ticket->id));
			} else {
				$this->Session->setFlash(__('The Ticket could not be saved. Please, try again.', true));
				$this->redirect($this->referer());
			}
		}
	}
}
?>