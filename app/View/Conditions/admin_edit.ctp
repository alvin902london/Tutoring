<div class="conditions form">
<?php echo $this->Form->create('Condition'); ?>
	<fieldset>
		<legend><?php echo __('Edit Condition'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Condition.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Condition.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Conditions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
