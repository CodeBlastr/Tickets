<?php
class TicketDepartmentsAssignee extends TicketsAppModel {

	var $name = 'TicketDepartmentsAssignee';
	var $validate = array(
		'user_id' => array('numeric'),
		'ticket_department_id' => array('numeric'),
		'creator_id' => array('numeric'),
		'modifier_id' => array('numeric')
	); 
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'Users.User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TicketDepartment' => array(
			'className' => 'Enumeration',
			'foreignKey' => 'ticket_department_id',
			'conditions' => array('type' => 'TICKETDEPARTMENT'),
			'fields' => '',
			'order' => ''
		),
		'Creator' => array(
			'className' => 'Users.User',
			'foreignKey' => 'creator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modifier' => array(
			'className' => 'Users.User',
			'foreignKey' => 'modifier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>