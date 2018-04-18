<div class="conditions form">
<?php echo $this->Form->create('Condition'); ?>
	<fieldset>
		<legend><?php echo __('Add Condition'); ?></legend>
	<?php
		echo $this->Form->input('post_id');
		echo $this->Form->input('week');
		echo $this->Form->input('start');
		echo $this->Form->input('indicator');
		echo $this->Form->input('end');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Conditions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
