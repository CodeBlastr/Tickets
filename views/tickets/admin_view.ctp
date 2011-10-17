<div class="tickets view">
<h2><?php  __('Ticket');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ticket['Ticket']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ticket['Parent']['id'], array('controller' => 'tickets', 'action' => 'view', $ticket['Parent']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subject'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ticket['Ticket']['subject']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ticket['Ticket']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ticket Department'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ticket['TicketDepartment']['name'], array('plugin' => null, 'controller' => 'enumerations', 'action' => 'view', $ticket['TicketDepartment']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contact'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ticket['Contact']['id'], array('plugin' => 'contacts', 'controller' => 'contacts', 'action' => 'view', $ticket['Contact']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Creator'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ticket['Creator']['username'], array('plugin' => null, 'controller' => 'users', 'action' => 'view', $ticket['Creator']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ticket['Ticket']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>




<?php 
// set the contextual menu items
$this->Menu->setValue(array(
	array(
		'heading' => 'Tickets',
		'items' => array(
			$this->Html->link(__('Edit Ticket', true), array('action' => 'edit', $ticket['Ticket']['id'])),
			$this->Html->link(__('Delete Ticket', true), array('action' => 'delete', $ticket['Ticket']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ticket['Ticket']['id'])),
			$this->Html->link(__('New Ticket', true), array('action' => 'edit')),
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
<?php #debug($ticket); ?>