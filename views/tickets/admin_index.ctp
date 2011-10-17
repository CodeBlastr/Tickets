<div class="tickets index">
<h2><?php __('Tickets');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('subject');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('ticket_department_id');?></th>
	<th><?php echo $paginator->sort('contact_id');?></th>
	<th><?php echo $paginator->sort('creator_id');?></th>
	<th><?php echo $paginator->sort('modifier_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($tickets as $ticket):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $ticket['Ticket']['id']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['subject']; ?>
		</td>
		<td>
			<?php echo $text->truncate($ticket['Ticket']['description'], 75, array('ending' => '...', 'html' => true)); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticket['TicketDepartment']['name'], array('controller' => 'enumerations', 'action' => 'view', $ticket['TicketDepartment']['id'])); ?>
		</td>
		<td>
        	<?php 
			if (isset($ticket['Contact']['ContactPerson']['id'])) : 
				$relator = $ticket['Contact']['ContactPerson']['first_name'].' '.$ticket['Contact']['ContactPerson']['last_name']; 
				$relator_id = $ticket['Contact']['ContactPerson']['id']; 
				$relator_ctrl = 'contact_people';
			elseif (isset($ticket['Contact']['ContactCompany']['id'])) : 
				$relator = $ticket['Contact']['ContactCompany']['name']; 
				$relator_id = $ticket['Contact']['ContactCompany']['id']; 
				$relator_ctrl = 'contact_companies';
			else: 
				$relator = null;
			 endif;
			echo $this->Html->link($relator, array('plugin' => 'contacts', 'controller' => 'contacts', 'action' => 'view', $ticket['Contact']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticket['Creator']['username'], array('controller' => 'users', 'action' => 'view', $ticket['Creator']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticket['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $ticket['Modifier']['id'])); ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['created']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $ticket['Ticket']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ticket['Ticket']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ticket['Ticket']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ticket['Ticket']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<?php echo $this->element('paging'); ?>



<?php 
// set the contextual menu items
$this->Menu->setValue(array(
	array(
		'heading' => 'Tickets',
		'items' => array(
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
