<div class="requirements view">
<h2><?php echo __('Requirement'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($requirement['Requirement']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($requirement['Post']['title'], array('controller' => 'posts', 'action' => 'view', $requirement['Post']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($requirement['Requirement']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Requirement'), array('action' => 'edit', $requirement['Requirement']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Requirement'), array('action' => 'delete', $requirement['Requirement']['id']), array(), __('Are you sure you want to delete # %s?', $requirement['Requirement']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Requirements'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requirement'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
