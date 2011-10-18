<div class="ticketDepartmentsAssignees form">
<?php echo $this->Form->create('TicketDepartmentsAssignee', array('url' => array('plugin' => 'tickets', 'controller' => 'ticket_departments_assignees', 'action' => 'edit')));?>
	<fieldset>
 		<legend><?php echo __('Edit TicketDepartmentsAssignee');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('ticket_department_id');
		echo $this->Form->input('creator_id');
		echo $this->Form->input('modifier_id');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('TicketDepartmentsAssignee.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('TicketDepartmentsAssignee.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List TicketDepartmentsAssignees', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enumerations', true), array('controller' => 'enumerations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket Department', true), array('controller' => 'enumerations', 'action' => 'add')); ?> </li>
	</ul>
</div>
