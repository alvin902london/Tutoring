<div class="firstConditions index">
	<h2><?php echo __('First Conditions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('post_id'); ?></th>
			<th><?php echo $this->Paginator->sort('week'); ?></th>
			<th><?php echo $this->Paginator->sort('start'); ?></th>
			<th><?php echo $this->Paginator->sort('indicator'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($firstConditions as $firstCondition): ?>
	<tr>
		<td><?php echo h($firstCondition['FirstCondition']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($firstCondition['Post']['title'], array('controller' => 'posts', 'action' => 'view', $firstCondition['Post']['id'])); ?>
		</td>
		<td><?php echo h($firstCondition['FirstCondition']['week']); ?>&nbsp;</td>
		<td><?php echo h($firstCondition['FirstCondition']['start']); ?>&nbsp;</td>
		<td><?php echo h($firstCondition['FirstCondition']['indicator']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $firstCondition['FirstCondition']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $firstCondition['FirstCondition']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $firstCondition['FirstCondition']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $firstCondition['FirstCondition']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New First Condition'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
