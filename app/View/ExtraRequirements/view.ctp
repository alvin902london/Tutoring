<div class="extraRequirements view">
<h2><?php echo __('Extra Requirement'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($extraRequirement['ExtraRequirement']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($extraRequirement['Post']['title'], array('controller' => 'posts', 'action' => 'view', $extraRequirement['Post']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($extraRequirement['ExtraRequirement']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Extra Requirement'), array('action' => 'edit', $extraRequirement['ExtraRequirement']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Extra Requirement'), array('action' => 'delete', $extraRequirement['ExtraRequirement']['id']), array(), __('Are you sure you want to delete # %s?', $extraRequirement['ExtraRequirement']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Extra Requirements'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Extra Requirement'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
