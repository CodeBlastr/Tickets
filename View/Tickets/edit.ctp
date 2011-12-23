<div class="tickets form">
<?php echo $this->Form->create('Ticket', array('action' => 'edit'));?>
	<fieldset>
 		<legend><?php echo __('Add Ticket'); ?></legend>
	<?php
		echo $this->Form->input('Ticket.ticket_department_id');
		echo $this->Form->input('Ticket.subject');
		echo $this->Form->input('Ticket.description', array('type' => 'richtext', 'ckeSettings' => array('buttons' => array('Bold','Italic','Underline','FontSize','TextColor','BGColor','-','NumberedList','BulletedList','Blockquote','JustifyLeft','JustifyCenter','JustifyRight','-','Link','Unlink','-', 'Image'))));
	?>
         </div>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Tickets',
		'items' => array(
			$this->Html->link(__('My Tickets', true), array('action' => 'index')),
			)
		),
	)
);
?>


<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Tickets',
		'items' => array(
			$this->Html->link(__('My Tickets', true), array('action' => 'index')),
			)
		),
	)));
?>
