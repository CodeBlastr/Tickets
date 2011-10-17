<div class="tickets form">
<?php echo $form->create('Ticket', array('action' => 'edit'));?>
	<fieldset>
 		<legend><?php __('Add Ticket'); ?></legend>
	<?php
		echo $form->input('Ticket.ticket_department_id');
		echo $form->input('Ticket.subject');
		echo $form->input('Ticket.description', array('type' => 'richtext', 'ckeSettings' => array('buttons' => array('Bold','Italic','Underline','FontSize','TextColor','BGColor','-','NumberedList','BulletedList','Blockquote','JustifyLeft','JustifyCenter','JustifyRight','-','Link','Unlink','-', 'Image'))));
	?>
         </div>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<?php 
// set the contextual menu items
$menu->setValue(array(
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
$menu->setValue(array(
	array(
		'heading' => 'Tickets',
		'items' => array(
			$this->Html->link(__('My Tickets', true), array('action' => 'index')),
			)
		),
	)
);
?>
