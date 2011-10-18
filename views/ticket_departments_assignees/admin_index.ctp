<div class="ticketDepartmentsAssignees index">
<h2><?php echo __('TicketDepartmentsAssignees');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('user_id');?></th>
	<th><?php echo $this->Paginator->sort('ticket_department_id');?></th>
	<th><?php echo $this->Paginator->sort('creator_id');?></th>
	<th><?php echo $this->Paginator->sort('modifier_id');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($ticketDepartmentsAssignees as $ticketDepartmentsAssignee):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticketDepartmentsAssignee['User']['username'], array('controller' => 'users', 'action' => 'view', $ticketDepartmentsAssignee['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticketDepartmentsAssignee['TicketDepartment']['name'], array('controller' => 'enumerations', 'action' => 'view', $ticketDepartmentsAssignee['TicketDepartment']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticketDepartmentsAssignee['Creator']['username'], array('controller' => 'users', 'action' => 'view', $ticketDepartmentsAssignee['Creator']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticketDepartmentsAssignee['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $ticketDepartmentsAssignee['Modifier']['id'])); ?>
		</td>
		<td>
			<?php echo $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['created']; ?>
		</td>
		<td>
			<?php echo $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<?php echo $this->element('paging'); ?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New TicketDepartmentsAssignee', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enumerations', true), array('controller' => 'enumerations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket Department', true), array('controller' => 'enumerations', 'action' => 'add')); ?> </li>
	</ul>
</div>
