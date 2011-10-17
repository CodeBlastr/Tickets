<div class="tickets form">
<?php echo $form->create('Ticket', array('url' => array('plugin' => 'tickets', 'controller' => 'tickets', 'action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit Ticket');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('subject');
		echo $form->input('description');
		echo $form->input('ticket_department_id');
		echo $form->input('contact_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>



<?php 
// set the contextual menu items
$menu->setValue(array(
	array(
		'heading' => 'Tickets',
		'items' => array(
			$this->Html->link(__('Delete', true), array('action' => 'delete', $form->value('Ticket.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Ticket.id'))),
			$this->Html->link(__('List Tickets', true), array('action' => 'index')),
			)
		),
	array(
		'heading' => 'Departments',
		'items' => array(
			$this->Html->link(__('Departments', true), array('controller' => 'enumerations', 'action' => 'index')),
			$this->Html->link(__('New Department', true), array('controller' => 'enumerations', 'action' => 'add')),
			$this->Html->link(__('Department Assignees', true), array('controller' => 'ticket_departments_assignees', 'action' => 'index')),
			)
		),
	)
);
?>