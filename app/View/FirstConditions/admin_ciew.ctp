<div class="firstConditions view">
<h2><?php echo __('First Condition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($firstCondition['FirstCondition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($firstCondition['Post']['title'], array('controller' => 'posts', 'action' => 'view', $firstCondition['Post']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Week'); ?></dt>
		<dd>
			<?php echo h($firstCondition['FirstCondition']['week']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($firstCondition['FirstCondition']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indicator'); ?></dt>
		<dd>
			<?php echo h($firstCondition['FirstCondition']['indicator']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit First Condition'), array('action' => 'edit', $firstCondition['FirstCondition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete First Condition'), array('action' => 'delete', $firstCondition['FirstCondition']['id']), array(), __('Are you sure you want to delete # %s?', $firstCondition['FirstCondition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List First Conditions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New First Condition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
