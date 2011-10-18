<div class="tickets form">
<?php echo $this->Form->create('Ticket', array('url' => array('plugin' => 'tickets', 'controller' => 'tickets', 'action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit Ticket');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('subject');
		echo $this->Form->input('description');
		echo $this->Form->input('ticket_department_id');
		echo $this->Form->input('contact_id');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>



<?php 
// set the contextual menu items
echo $this->Element('context_menu', array('menus' => array(
	array(
		'heading' => 'Tickets',
		'items' => array(
			$this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Ticket.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Ticket.id'))),
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
	)));
?>