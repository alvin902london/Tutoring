<div class="container">
	<div class="page-header">
		<h1><?php echo __('已登記個案：配對中'); ?></h1>
	</div>		
	<table class="table table-striped">
		<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('created'); ?></th>	
			<th><?php echo $this->Paginator->sort('subject'); ?></th>			
			<th><?php echo $this->Paginator->sort('frequency'); ?></th>			
			<th><?php echo $this->Paginator->sort('rate'); ?></th>			
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($posts as $post): ?>
			<tr>
				<td><?php echo h($this->Time->format('jS F', $post['Post']['created'])); ?>&nbsp;</td>
				<td><?php echo h($post['Post']['student_grade']); ?>&nbsp;<?php echo h($this->Coma->coma($post['Subject'], 'index')); ?>&nbsp;</td>
				<td><?php echo __('每星期') ?><?php echo h($post['Post']['frequency']); ?><?php echo __('堂') ?><?php echo __('，'); ?><?php echo __('每堂'); ?><?php echo h($post['Post']['duration']);?><?php echo __('小時'); ?></td>
				<td><?php echo h($post['Post']['rate']); ?><?php if ($post['Post']['rate'] !== '導師自訂') { echo h($post['Post']['rate_unit']); } ?></td>		
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'add', $post['Post']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->element('paging'); ?>
	<div class="page-header">
		<h1><?php echo __('已登記個案：已配對'); ?></h1>
	</div>		
	<table class="table table-striped">
		<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('created'); ?></th>	
			<th><?php echo $this->Paginator->sort('subject'); ?></th>			
			<th><?php echo $this->Paginator->sort('frequency'); ?></th>			
			<th><?php echo $this->Paginator->sort('rate'); ?></th>			
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($posts_ordered as $post_ordered): ?>
			<tr>
				<td><?php echo h($this->Time->format('jS F', $post_ordered['Post']['created'])); ?>&nbsp;</td>
				<td><?php echo h($post_ordered['Post']['student_grade']); ?>&nbsp;<?php echo h($this->Coma->coma($post_ordered['Subject'], 'index')); ?>&nbsp;</td>
				<td><?php echo __('每星期') ?><?php echo h($post_ordered['Post']['frequency']); ?><?php echo __('堂') ?><?php echo __('，'); ?><?php echo __('每堂'); ?><?php echo h($post_ordered['Post']['duration']);?><?php echo __('小時'); ?></td>
				<td><?php echo h($post_ordered['Post']['rate']); ?><?php if ($post_ordered['Post']['rate'] !== '導師自訂') { echo h($post_ordered['Post']['rate_unit']); } ?></td>		
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'add', $post_ordered['Post']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->element('paging'); ?>	
</div>