<?php
class TicketDepartmentsAssigneesController extends TicketsAppController {

	var $name = 'TicketDepartmentsAssignees';
	var $helpers = array('Html', 'Form');

	
	function index() {
		$this->TicketDepartmentsAssignee->recursive = 0;
		$this->set('ticketDepartmentsAssignees', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TicketDepartmentsAssignee.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('ticketDepartmentsAssignee', $this->TicketDepartmentsAssignee->read(null, $id));
	}

	function edit($id = null) {
		if (!empty($this->request->data)) {
			if ($this->TicketDepartmentsAssignee->save($this->request->data)) {
				$this->Session->setFlash(__('The TicketDepartmentsAssignee has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TicketDepartmentsAssignee could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->TicketDepartmentsAssignee->read(null, $id);
		}
		$users = $this->TicketDepartmentsAssignee->User->find('list');
		$ticketDepartments = $this->TicketDepartmentsAssignee->TicketDepartment->find('list', array('conditions' => array('TicketDepartment.type' => 'TICKETDEPARTMENT')));
		$creators = $this->TicketDepartmentsAssignee->Creator->find('list');
		$modifiers = $this->TicketDepartmentsAssignee->Modifier->find('list');
		$this->set(compact('users','ticketDepartments','creators','modifiers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TicketDepartmentsAssignee', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TicketDepartmentsAssignee->delete($id)) {
			$this->Session->setFlash(__('TicketDepartmentsAssignee deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>