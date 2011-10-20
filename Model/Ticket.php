<?php
class Ticket extends TicketsAppModel {

	var $name = 'Ticket';
	var $actsAs = array('Tree' , 'Acl');
	var $validate = array(
		'subject' => array('notempty')
	);

/**
 * an array of user fields which can have access when using the creators user role is allowed from permissions
 * it is option and is only necessary if limiting, by default all belongsTo that have a className of User are used.
 */

	var $belongsTo = array(
		'TicketParent' => array(
			'className' => 'Tickets.Ticket',
			'foreignKey' => 'parent_id',
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
		'Contact' => array(
			'className' => 'Contacts.Contact',
			'foreignKey' => 'contact_id',
			'conditions' => '',
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