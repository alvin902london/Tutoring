<div class="extraRequirements form">
<?php echo $this->Form->create('ExtraRequirement'); ?>
	<fieldset>
		<legend><?php echo __('Edit Extra Requirement'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('post_id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ExtraRequirement.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ExtraRequirement.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Extra Requirements'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
