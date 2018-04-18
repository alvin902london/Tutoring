<?php echo $this->element('posts_form_head'); ?>
<?php echo $this->Form->create('Post', array(    
	'inputDefaults' => array(
		'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
		'label' => false,
		'div' => false,
		'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))
	)   
)); ?>
<div class="row">
	<div class="col-lg-7 col-lg-offset-1">
		<div class="row">
			<div class="col-lg-12">
				<h3><?php echo __('預覧'); ?></h3>
				<p class="help-block"><?php echo __('請確認資料正確無誤，如需更改，請按上一步。'); ?></p>
				<div class="well">
					<h4><?php echo __('聯絡資料（不會公開）'); ?></h4>
					<table class="table table-striped">
						<tr>
							<th class="col-md-5"><?php echo __('聯絡人姓名'); ?></th>
							<td><?php echo AuthComponent::user('contact_person'); ?></td>
						</tr>
						<tr>
							<th class="col-md-5"><?php echo __('手提電話'); ?></th>
							<td><?php echo AuthComponent::user('mobile'); ?></td>
						</tr>
	      				<?php if(!AuthComponent::user('id')): ?>
							<tr>
								<th class="col-md-5"><?php echo __('電郵地址'); ?></th>
								<td><?php echo $source['User']['username']; ?></td>
							</tr>
						<?php endif; ?>										
					</table>
				</div>				
				<div class="well">
					<h4><?php echo __('導師應徵時看到的資料') ?></h4>
					<table class="table table-striped">
						<tr>
							<th class="col-md-5"><?php echo __('學生級別'); ?></th>
							<td><?php echo $source['Post']['student_grade']; ?></td>
						</tr>
						<?php if(!empty($source['Post']['student_number'])) : ?>
							<tr>
								<th class="col-md-5"><?php echo __('學生人數'); ?></th>
								<td><?php echo $source['Post']['student_number']; ?></td>
							</tr>	
						<?php endif; ?>	
						<tr>
							<th class="col-md-5"><?php echo __('每週上課次數'); ?></th>
							<td><?php echo __('每星期') ?><?php echo $source['Post']['frequency']; ?><?php echo __('堂') ?></td>
						</tr>
						<tr>
							<th class="col-md-5"><?php echo __('每堂時間長度'); ?></th>
							<td><?php echo $source['Post']['duration']; ?></td>
						</tr>
						<tr>
							<th class="col-md-5"><?php echo __('合適上課時間'); ?></th>
						<?php $str = ''; ?>
						<?php foreach ($source['Condition'] as $key => $value) : ?>
							<?php echo $str; ?>
								<td><?php echo $value['week']; ?> 由 <?php echo $value['start']; ?> 至 <?php echo $value['end']; ?></td>
							</tr>
							<?php $str = '<tr><th></th>'; ?>
						<?php endforeach; ?>
						<?php if(isset($source['FirstCondition'])) : ?>
							<tr>
								<th class="col-md-5"><?php echo __('首堂合適時間'); ?></th>
								<td><?php echo $source['FirstCondition']['week']; ?> 由 <?php echo $source['FirstCondition']['start']; ?> 至 <?php echo $source['FirstCondition']['end']; ?></td>
							</tr>	
						<?php endif; ?>					
						<tr>
							<th class="col-md-5"><?php echo __('最快上課日期'); ?></th>
							<td><?php echo $source['Post']['first']; ?></td>
						</tr>	
						<tr>
							<th class="col-md-5"><?php echo __('補習地區及屋苑'); ?></th>
							<td><?php echo $source['Post']['district']; ?> <?php echo $source['Post']['estate']; ?></td>
						</tr>
						<tr>
							<th class="col-md-5"><?php echo __('學費'); ?></th>
							<td><?php if(empty($source['Post']['rate'])) { echo '導師自訂'; } else { echo $source['Post']['rate']; echo $source['Post']['rate_unit']; } ?></td>
						</tr>	
						<tr>
							<th class="col-md-5"><?php echo __('補習科目'); ?></th>
							<td><?php echo $this->Coma->coma($subjects, 'preview'); ?></td>
						</tr>
						<tr>
							<th class="col-md-5" colspan="2"><?php echo __('導師要求'); ?></th>
						</tr>
						<?php if(!empty($source['Post']['tutor_type'])) : ?>
							<tr>
								<th class="col-md-5"><?php echo __('類型'); ?></th>
								<td><?php echo $source['Post']['tutor_type']; ?></td>
							</tr>
						<?php endif; ?>
						<?php if(!empty($source['Requirement'][0]['name'])) : ?>
							<tr>
								<th class="col-md-5"><?php echo __('性別'); ?></th>
								<td><?php echo $source['Requirement'][0]['name']; ?></td>
							</tr>
						<?php endif; ?>	
						<?php if(!empty($source['ExtraRequirement'])) : ?>
							<tr>
								<th rowspan="<?php echo count(array_keys($source['ExtraRequirement'])); ?>" class="col-md-5"><?php echo __('其他要求'); ?></th>
							<?php $str = ''; ?>
							<?php foreach ($source['ExtraRequirement'] as $key => $value) : ?>
								<?php echo $str; ?>
									<td><?php echo $value['name']; ?></td>
								</tr>
								<?php $str = '<tr>'; ?>
							<?php endforeach; ?>
						<?php endif; ?>																					
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php echo $this->Form->input('how', array(
				    'options' => array(
				    	__('舊有用戶，再次找尋導師') => __('舊有用戶，再次找尋導師'),		    	
				    	__('Google') => __('Google'),
				    	__('Yahoo!') => __('Yahoo!'),
				    	__('Facebook') => __('Facebook'),
				    	__('朋友介紹') => __('朋友介紹'),
				    	__('傳媒報道') => __('傳媒報道')
				    ),
				    'empty' => __('請選擇'),
			    	'label' => array(
			    		'class' => 'control-label',
			    		'text' => __('您如何得知我們？')
			    		),
				    'div' => 'form-group',
				    'class' => 'form-control'
				)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php echo $this->Form->input('agree', array(
					'format' => array('before', 'input', 'between', 'label', 'after', 'error'),
					'div' => 'checkbox',
					'type' => 'checkbox', 
					'before' => '<label for="PostAgree">',
					'after' => __('本人得悉 "After School" 有關使用方式及服務條件，並遵守服務條款。', true) . '</label>',
					'class' => 'checkbox',
					//'hiddenField' => false, 
					'value' => '1'
				)); ?>
		
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<?php 
				echo $this->Html->link(__('上一步'),
				    array('action' => 'msf_step', $params['currentStep'] -1),
				    array('class' => 'btn btn-default', 'div' => array(
						'class' => 'form-group'
					))
				); 
				?>
			</div>
			<div class="col-lg-6">
				<?php
				$options = array(
					'label' => __('登記並刊登廣告'),
					'class' => 'btn btn-primary btn-lg pull-right', 
					'div' => array(
						'class' => 'form-group'
					)
				);
				echo $this->Form->end($options); 
				?>
			</div>
		</div>		
	</div>	
</div>			
<br>
<?php echo $this->element('extend_forms'); ?>