<div class="profiles index">
	<h2><?php echo __('Profiles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('full_name_en'); ?></th>
			<th><?php echo $this->Paginator->sort('full_name_chi'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('birth_year'); ?></th>
			<th><?php echo $this->Paginator->sort('identity'); ?></th>
			<th><?php echo $this->Paginator->sort('district'); ?></th>
			<th><?php echo $this->Paginator->sort('estate'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('tutor_type'); ?></th>
			<th><?php echo $this->Paginator->sort('language'); ?></th>
			<th><?php echo $this->Paginator->sort('education'); ?></th>
			<th><?php echo $this->Paginator->sort('experience'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($profiles as $profile): ?>
	<tr>
		<td><?php echo h($profile['Profile']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($profile['User']['id'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
		</td>
		<td><?php echo h($profile['Profile']['full_name_en']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['full_name_chi']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['gender']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['birth_year']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['identity']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['district']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['estate']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['address']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['tutor_type']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['language']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['education']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['experience']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $profile['Profile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $profile['Profile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $profile['Profile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $profile['Profile']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Profile'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
