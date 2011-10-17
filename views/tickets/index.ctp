<div class="tickets index">
<h2><?php __('My Tickets');?></h2>
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
	<th><?php echo $paginator->sort('creator_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
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
			<?php echo $this->Html->link(__($ticket['Ticket']['subject'], true), array('action' => 'view', $ticket['Ticket']['id'])); ?>
		</td>
		<td>
			<?php echo $text->truncate($ticket['Ticket']['description'], 25, array('ending' => '...', 'html' => true)); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticket['TicketDepartment']['name'], array('controller' => 'enumerations', 'action' => 'view', $ticket['TicketDepartment']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticket['Creator']['username'], array('controller' => 'users', 'action' => 'view', $ticket['Creator']['id'])); ?>
		</td>
		<td>
			<?php echo $time->niceShort($ticket['Ticket']['created']); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<?php echo $this->element('paging'); ?>
<?php 
// set the contextual menu items
/*$menu->setValue(array(
	array(
		'heading' => 'Tickets',
		'items' => array(
			$this->Html->link(__('New Ticket', true), array('action' => 'edit')),
			)
		),
	)
);*/
?>