<div class="page-header">
	<h1><?php echo __('個案'); ?><?php echo h($post['Post']['id']); ?></h1>
</div>
<?php echo $this->Form->create('Comment'); ?>
<div class="row">
	<div class="col-lg-6">
		<table class="table table-striped">
			<tr>
				<th><?php echo $this->Paginator->sort('created'); ?></th>	
				<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
				<td>
					<div class="btn-group" data-toggle="buttons">
 						<label class="btn btn-default">
 							<input type="checkbox" autocomplete="off" checked> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
 						</label>
					</div>
				</td>
			</tr>
			<tr>
				<th><?php echo $this->Paginator->sort('grade'); ?></th>					
				<td><?php echo h($post['Post']['student_grade']); ?>&nbsp;</td>	
				<td>
					<div class="btn-group" data-toggle="buttons">
 						<label class="btn btn-default">
 							<input type="checkbox" autocomplete="off" checked> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
 						</label>
					</div>
				</td>					
			</tr>	
			<tr>
				<th><?php echo $this->Paginator->sort('subject'); ?></th>			
				<td><?php echo h($this->Coma->coma($post['Subject'], 'index')); ?>&nbsp;</td>
				<td>
					<div class="btn-group" data-toggle="buttons">
 						<label class="btn btn-default">
 							<input type="checkbox" autocomplete="off" checked> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
 						</label>
					</div>
				</td>			
			</tr>
			<tr>
				<th><?php echo $this->Paginator->sort('frequency'); ?></th>			
				<td><?php echo h($post['Post']['frequency']); ?>&nbsp;</td>
				<td>
					<div class="btn-group" data-toggle="buttons">
 						<label class="btn btn-default">
 							<input type="checkbox" autocomplete="off" checked> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
 						</label>
					</div>
				</td>					
			</tr>
			<tr>
				<th><?php echo $this->Paginator->sort('duration'); ?></th>	
				<td><?php echo h($post['Post']['duration']); ?>&nbsp;</td>
				<td>
					<div class="btn-group" data-toggle="buttons">
 						<label class="btn btn-default">
 							<input type="checkbox" autocomplete="off" checked> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
 						</label>
					</div>
				</td>				
			</tr>
			<tr>
				<th><?php echo $this->Paginator->sort('rate'); ?></th>			
				<td><?php echo h($post['Post']['rate']); ?>&nbsp;</td>	
				<td>
					<div class="btn-group" data-toggle="buttons">
 						<label class="btn btn-default">
 							<input type="checkbox" autocomplete="off" checked> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
 						</label>
					</div>
				</td>								
			</tr>
		</table>
	</div>
</div>

<?php foreach ($comments as $comment): ?>
	<div class="dl-horizontal">
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo $this->Html->link(h($comment['Comment']['user_id']), array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
				&nbsp;
			</dd>
			<dd>
				<?php echo h($comment['Comment']['body']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Select'); ?></dt>
			<dd>
				<?php echo $this->Html->link(__('Select'), array('controller' => 'orders', 'action' => 'preview', $post['Post']['id'], $comment['Comment']['id'])); ?>
			</dd>
		</dl>
	</div>
<?php endforeach; ?>
<?php echo $this->element('paging'); ?>
