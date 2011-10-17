<div class="ticketDepartmentsAssignees form">
<?php echo $form->create('TicketDepartmentsAssignee', array('url' => array('plugin' => 'tickets', 'controller' => 'ticket_departments_assignees', 'action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit TicketDepartmentsAssignee');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('ticket_department_id');
		echo $form->input('creator_id');
		echo $form->input('modifier_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $form->value('TicketDepartmentsAssignee.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('TicketDepartmentsAssignee.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List TicketDepartmentsAssignees', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enumerations', true), array('controller' => 'enumerations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket Department', true), array('controller' => 'enumerations', 'action' => 'add')); ?> </li>
	</ul>
</div>
