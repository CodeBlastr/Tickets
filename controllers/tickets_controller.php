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

	var $name = 'Tickets';
	var $helpers = array('Cke');

	function index() {
		$this->paginate = array(
			'conditions' => array(
				# only show tickets for the logged in user
				'Ticket.creator_id' => $this->Session->read('Auth.User.id'),
				'Ticket.parent_id' => null
				),
			'contain' => array(
				'TicketDepartment',
				'Contact' => array(
					'ContactPerson',
					'ContactCompany',
					),
				'Creator'
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
				'Contact' => array(
					'ContactPerson',
					'ContactCompany',
					),
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
		if (empty($this->params['url']['ticket_department_id'])) {
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

	function admin_index() {
		$this->paginate = array(
			'conditions' => array(
				# only show tickets for the logged in user
				'Ticket.parent_id' => null
				),
			'contain' => array(
				'TicketDepartment',
				'Contact' => array(
					'ContactPerson',
					'ContactCompany',
					),
				'Creator',
				'Modifier',
				)
			);
		$this->set('tickets', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Ticket.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Ticket->recursive = 0;
		$this->set('ticket', $this->Ticket->read(null, $id));
	}

	function admin_edit($id = null) {
		if (!empty($this->request->data)) {
			if ($this->Ticket->save($this->request->data)) {
				$this->Session->setFlash(__('The Ticket has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Ticket could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Ticket->read(null, $id);
		}
		$ticketDepartments = $this->Ticket->TicketDepartment->find('list', array('conditions' => array('TicketDepartment.type' => 'TICKETDEPARTMENT')));
		
		$combines = $this->Ticket->Contact->query("SELECT concat(Contact.first_name, ' ', Contact.last_name) AS name, Contact.contact_id FROM contact_people AS Contact UNION SELECT Contact.name AS name, Contact.contact_id FROM contact_companies AS Contact ORDER BY contact_id");		
		$contacts = array();
		foreach ($combines as $combine) :
			$contacts += array($combine[0]['contact_id'] => $combine[0]['name']); 
		endforeach;	
		
		$this->set(compact('ticketDepartments','contacts'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Ticket', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ticket->delete($id)) {
			$this->Session->setFlash(__('Ticket deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>