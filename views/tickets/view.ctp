 <div class="ticket view">
	<div class="contactname">
		<h2><span id="ticketsubject"><?php __($ticket['Ticket']['subject']); ?></span> for <?php echo $ticket['TicketDepartment']['name']; __('Department'); ?></h2>
	</div>
	
<div id="tabscontent">
  <div id="tabContent1" class="tabContent" style="display:yes;">
	<div class="details data">
		<ul class="detail datalist">
			<li>
            	<span class="label"><?php __('Department'); ?></span>
                <span name="startdate" class="edit" id="<?php __($ticket['Ticket']['id']); ?>"><?php echo $ticket['TicketDepartment']['name']; ?></span>
            </li>
			<li>
            	<span class="label"><?php __('Created Date'); ?></span>
                <span name="createddate" class="edit" id="<?php __($ticket['Ticket']['id']); ?>"><?php echo $time->format('M d, Y', $ticket['Ticket']['created']); ?></span>
            </li>
        <?php foreach ($ticket['TicketDepartment']['TicketDepartmentsAssignee'] as $assignee) { ?>
			<li>
            	<span class="label"><?php __('Assignee'); ?></span>
                <span name="assignee" class="edit"  id="<?php __($ticket['Ticket']['id']); ?>"><?php echo $assignee['User']['username']; ?></span>
            </li>
       	<?php } ?>
		</ul>
	</div>
	<div class="descriptions data">
		<div class="description">
			<div id="detail<?php echo $ticket['Ticket']['id']; ?>"><?php __($ticket['Ticket']['description']); ?></div>
		</div>
	</div>
	
    <p class="action"><?php echo $this->Html->link(__('New Message', true), array(''), array('class' => 'toggleClick', 'name' => 'addthreadform'.$ticket['Ticket']['id'])); ?></p>	
	<div class="subissues data">
        <div class="issue">	
		  <div id="addthreadform<?php echo $ticket['Ticket']['id']; ?>" class="hide">
			<?php echo $form->create('Ticket', array('action' => 'edit'));?>
				<?php
					echo $form->input('subject'); 
					echo $form->input('Ticket.description', array('type' => 'richtext', 'ckeSettings' => array('buttons' => array('Bold','Italic','Underline','FontSize','TextColor','BGColor','-','NumberedList','BulletedList','Blockquote','JustifyLeft','JustifyCenter','JustifyRight','-','Link','Unlink','-', 'Image'))));
					echo $form->hidden('parent_id', array('value' => $ticket['Ticket']['id']));
					echo $form->hidden('redirect', array('value' => $this->here));
				?>
			<?php echo $form->end('Submit');?>
		  </div>	
		<?php
		if ($ticketTree) { 
			foreach ($ticketTree[0]['children'] as $branch) { ?>
              <div class="branch-issue detail <?php # echo ($branch['children'][0] ? 'hide' : ''); ?>">	
			  	<p><span class="branch-ticket-subject"><?php echo $this->Html->link(__($branch['Ticket']['subject'], true), '', array('class' => 'toggleClick', 'name' => 'branchdescription'.$branch['Ticket']['id'])); ?></span></p>	
            	<div class="hide" id="branchdescription<?php echo $branch['Ticket']['id']; ?>">
            		<?php echo $branch['Ticket']['description']; ?>
	                <div id="extendeddetails<?php echo $branch['Ticket']['id']; ?>" class="hide">
						<p><?php __('Creator '.$branch['Creator']['username']); ?></p>
						<p><?php __('Created '.$time->nice($branch['Ticket']['created'])); ?></p>
	                </div>
    	        	<p class="action"><?php echo $this->Html->link(__('Show Details', true), array(''), array('class' => 'toggleClick', 'name' => 'extendeddetails'.$branch['Ticket']['id']));?><?php #echo $this->Html->link(__('Archive', true), array('action' => 'archive', $branch['Ticket']['id']));?><?php echo $this->Html->link(__('Reply', true), array(''), array('class' => 'toggleClick', 'name' => 'replyform'.$branch['Ticket']['id'])); ?></p>
                </div>
				<?php if ($branch['children'][0]) { 
						$branch['children'] = array_reverse($branch['children']);
					  	foreach ($branch['children'] as $child) { ?> 
						<div class="child-issue detail">
	            			<p><span class="child-ticket-subject"><?php echo $this->Html->link(__($child['Ticket']['subject'], true), '', array('class' => 'toggleClick', 'name' => 'childdescription'.$child['Ticket']['id'])); ?></span></p>	
	                        <div class="hide" id="childdescription<?php echo $child['Ticket']['id']; ?>">
			                <?php __($child['Ticket']['description']); ?>
                            
	               				<div id="extendeddetails<?php echo $child['Ticket']['id']; ?>" class="hide">
									<p><?php __('Creator: '.$child['Creator']['username']); ?></p>
									<p><?php __('Created: '.$time->nice($child['Ticket']['created'])); ?></p>
				                </div>
    	        				<p class="action"><?php echo $this->Html->link(__('Show Details', true), array(''), array('class' => 'toggleClick', 'name' => 'extendeddetails'.$child['Ticket']['id']));?><?php #echo $this->Html->link(__('Archive', true), array('action' => 'archive', $child['Ticket']['id']));?><?php echo $this->Html->link(__('Reply', true), array(''), array('class' => 'toggleClick', 'name' => 'replyform'.$branch['Ticket']['id'])); ?></p>
	                		</div>
                        </div>
					<?php } ?>
				<?php } ?>	
              </div>	
			<div id="replyform<?php echo $branch['Ticket']['id']; ?>" class="hide">
				<?php echo $form->create('Ticket', array('action' => 'edit'));?>
				<?php
					echo $form->input('subject', array('value' => 'Re: '.$branch['Ticket']['subject'])); 
					echo $form->input('ticket_department_id', array('type' => 'hidden', 'value' => $ticket['TicketDepartment']['id']));
					echo $form->input('description');
					echo $form->input('parent_id', array('type' => 'hidden', 'value' => $branch['Ticket']['id']));
					echo $form->input('redirect', array('type' => 'hidden', 'value' => $this->here));
				?>
				<?php echo $form->end('Submit');?>
			</div>   
		<?php
            }
		}
		?>
		</div>
	</div>
  </div> 
</div>
<p class="timing"><strong><?php __($ticket['Ticket']['subject']);?></strong><?php __(' was '); ?><strong><?php __('Created: '); ?></strong><?php echo $time->relativeTime($ticket['Ticket']['created']); ?><?php __(', '); ?><strong><?php __('Last Modified: '); ?></strong><?php echo $time->relativeTime($ticket['Ticket']['modified']); ?></p>

</div>

<?php # pr($ticketTree); ?>

<?php 
// set the contextual menu items
/*$menu->setValue(array(
	array(
		'heading' => 'Tickets',
		'items' => array(
			$this->Html->link(__('My Tickets', true), array('action' => 'index')),
			$this->Html->link(__('New Ticket', true), array('action' => 'edit')),
			)
		),
	)
);*/
?>
<?php #pr($ticket); ?>
