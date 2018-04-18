<div class="firstConditions form">
<?php echo $this->Form->create('FirstCondition'); ?>
	<fieldset>
		<legend><?php echo __('Add First Condition'); ?></legend>
	<?php
		echo $this->Form->input('post_id');
		echo $this->Form->input('week');
		echo $this->Form->input('start');
		echo $this->Form->input('indicator');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List First Conditions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
