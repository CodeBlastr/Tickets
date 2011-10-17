<div class="ticketDepartmentsAssignees view">
<h2><?php  __('TicketDepartmentsAssignee');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ticketDepartmentsAssignee['User']['username'], array('controller' => 'users', 'action' => 'view', $ticketDepartmentsAssignee['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ticket Department'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ticketDepartmentsAssignee['TicketDepartment']['name'], array('controller' => 'enumerations', 'action' => 'view', $ticketDepartmentsAssignee['TicketDepartment']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Creator'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ticketDepartmentsAssignee['Creator']['username'], array('controller' => 'users', 'action' => 'view', $ticketDepartmentsAssignee['Creator']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modifier'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ticketDepartmentsAssignee['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $ticketDepartmentsAssignee['Modifier']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit TicketDepartmentsAssignee', true), array('action' => 'edit', $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete TicketDepartmentsAssignee', true), array('action' => 'delete', $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ticketDepartmentsAssignee['TicketDepartmentsAssignee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List TicketDepartmentsAssignees', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New TicketDepartmentsAssignee', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enumerations', true), array('controller' => 'enumerations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket Department', true), array('controller' => 'enumerations', 'action' => 'add')); ?> </li>
	</ul>
</div>
