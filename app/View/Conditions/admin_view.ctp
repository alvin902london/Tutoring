<div class="conditions view">
<h2><?php echo __('Condition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($condition['Condition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($condition['Post']['title'], array('controller' => 'posts', 'action' => 'view', $condition['Post']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Week'); ?></dt>
		<dd>
			<?php echo h($condition['Condition']['week']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($condition['Condition']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indicator'); ?></dt>
		<dd>
			<?php echo h($condition['Condition']['indicator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($condition['Condition']['end']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Condition'), array('action' => 'edit', $condition['Condition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Condition'), array('action' => 'delete', $condition['Condition']['id']), array(), __('Are you sure you want to delete # %s?', $condition['Condition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Conditions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Condition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
