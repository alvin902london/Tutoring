<?php if (!empty($post['Post']['student_number'])) {
	$number = __('（小組') . $post['Post']['student_number'] . __('人）');
} else {
	$number = '';
} ?>
<!-- You have to escape because the result will not be valid HTML otherwise. -->
<div id="dom-target" style="display: none;"><?php echo htmlspecialchars($coordinates[0]); ?></div>
<div id="dom-target2" style="display: none;"><?php echo htmlspecialchars($coordinates[1]); ?></div>
<div id="dom-target3" style="display: none;"><?php echo htmlspecialchars($post['Post']['estate']); ?></div>
<?php if ($postOwner == false): ?>
<div class="container">
	<div class="row">
		<!-- Case -->
		<div class="col-lg-8">
			<div class="headline">
				<h1><?php echo __('個案資料'); ?></h1>	
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4">		
					<strong><?php echo __('刊登日期：'); ?></strong><?php echo $this->Time->format(__('Y年m月j日'), $post['Post']['created']); ?>
				</div>
			</div>								
			</div>					
			<div class="row">
				<div class="col-lg-4">
					<p><?php echo __('學生資料'); ?></p>
				</div>
				<div class="col-lg-4">
					<p><strong><?php echo __('科目：'); ?></strong><?php echo $post['Post']['student_grade']; ?>&nbsp;<?php echo $this->Coma->coma($post['Subject'], 'index'); ?>&nbsp;<?php echo $number; ?></p>
				</div>
				<div class="col-lg-4">
					<p><strong><?php echo __('上課地點：'); ?></strong><?php echo $post['Post']['district']; ?>&nbsp;<?php echo $post['Post']['estate']; ?></p>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-4"> 
					<p><?php echo __('時間'); ?></p>
				</div>
				<div class="col-lg-8">
					<p><strong><?php echo __('上課頻率：'); ?></strong><?php echo __('每星期') ?><?php echo $post['Post']['frequency']; ?><?php echo __('堂') ?><?php echo __('，'); ?><?php echo __('每堂'); ?><?php echo $post['Post']['duration']; ?><?php echo __('小時'); ?></p>
					<?php if(!empty($post['FirstCondition']['week'])): ?>
						<p><strong><?php echo __('首堂合適時間：'); ?></strong><?php echo $this->String->checkStartDate($post['Post']['created'], $post['Post']['first'], 'FirstCondition');?> <?php echo $post['FirstCondition']['week']; ?> <span class="text-border text-border-green tooltips" data-toggle="tooltip" data-original-title="<?php echo __('最早開始時間'); ?>"><?php echo $this->Time->format('h:i A', $post['FirstCondition']['start']); ?></span> <?php echo __('至'); ?> <span class="text-border text-border-green tooltips" data-toggle="tooltip" data-original-title="<?php echo __('最遲結束時間'); ?>"><?php echo $this->Time->format('h:i A', $post['FirstCondition']['end']); ?></span></p>
						<p><strong><?php echo __('其後合適時間：'); ?></strong><?php echo $this->Coma->coma($post['Condition'], 'condition'); ?></p>
					<?php else: ?>	
						<p><strong><?php echo __('首堂日期：'); ?></strong><?php echo $this->String->checkStartDate($post['Post']['created'], $post['Post']['first'], 'first'); ?></p>
						<p><strong><?php echo __('合適時間：'); ?></strong><?php echo $this->Coma->coma($post['Condition'], 'condition'); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-4">
					<p><?php echo __('導師要求'); ?></p>
				</div>
				<div class="col-lg-4">
					<p><strong><?php echo __('類型：'); ?></strong><?php echo $post['Post']['tutor_type']; ?></p>
					<p><strong><?php echo __('學費：'); ?></strong><?php echo $post['Post']['rate']; ?><?php if ($post['Post']['rate'] !== '導師自訂') { echo $post['Post']['rate_unit']; } ?></p>
				</div>
				<div class="col-lg-4">
					<?php if(!empty($post['Post']['tutor_gender'])): ?>
						<p><strong><?php echo __('性別：'); ?></strong><?php echo $post['Post']['tutor_gender']; ?></p>	
					<?php endif; ?>				
				</div>
			</div>
			<?php if(!empty(h($post['ExtraRequirement']))): ?>	
				<hr>
				<div class="row">
					<div class="col-lg-4 col-lg-offset-4">
						<p><strong><?php echo __('其他要求：'); ?></strong><?php echo $this->Coma->coma($post['ExtraRequirement'], 'extra'); ?></p>	
					</div>
				</div>
			<?php endif; ?>	
			<!-- Basic Map -->
			<div id="map" class="map"></div>
			<!-- End Basic Map -->
		</div>	
		<!-- End Case -->
		<!-- Reply -->
		<div class="col-lg-4">
			<div class="headline">
				<h3><?php echo __('應徵'); ?></h3>
			</div>
			<?php echo $this->Form->create('Comment', array(    
				'inputDefaults' => array(
					'format' => array('before', 'label', 'between', 'input', 'after', 'error'),		
					'label' => false,
					'div' => false,
					'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))
				)   
			)); ?>
			<div class="panel panel-default">
				<div class="panel-body">
				<?php if (!AuthComponent::user('id')) : ?>
					<div class="row">
						<div class="col-lg-6">
							<?php echo $this->Form->input('User.username', array(
								'div' => 'form-group',
								'type' => 'text',
						    	'class' => 'form-control',
							    'label' => array(
							    	'class' => 'control-label',
							    	'text' => __('登入電郵')
							    ), 				    	
						    	'placeholder' => __('登入電郵'),
							)); ?>	
						</div>
						<div class="col-lg-6">
							<?php echo $this->Form->input('User.password', array(
								'div' => 'form-group',						
								'type' => 'password',
						    	'class' => 'form-control',
							    'label' => array(
							    	'class' => 'control-label',
							    	'text' => __('密碼')
							    ), 
						    	'placeholder' => __('密碼'),
							)); ?>				
						</div>
					</div>
					<hr class="devider devider-dotted">
				<?php endif; ?>					
					<div class="row">
						<div class="col-lg-6">
							<?php echo $this->Form->input('tag1', array(
								'type' => 'text',
								'maxlength' => '15',
							    'div' => 'form-group',  
							    'class' => 'form-control',
							    'label' => array(
							    	'class' => 'control-label',
							    	'text' => __('頂置標籤1')
							    	),    
							    'placeholder' => __('例子：港大畢業')
							)); ?>	
						</div>
						<div class="col-lg-6">
							<?php echo $this->Form->input('tag2', array(
								'type' => 'text',
							    'div' => 'form-group', 
								'maxlength' => '15',     
							    'class' => 'form-control',
							    'label' => array(
							    	'class' => 'control-label',
							    	'text' => __('頂置標籤2')
							    	),    
							    'placeholder' => __('例子：DSE Eng 5**')
							)); ?>	
						</div>
					</div>		
					<div class="row">
						<div class="col-lg-12">
							<p class="help-block"><span class="label rounded label-u"><?php echo __('頂置標籤'); ?></span> <?php echo __('請寫上能突出您的資料如學歷／成績／經驗'); ?></p>							
						</div>
					</div>											
					<div class="row">
						<div class="col-lg-12">
							<?php echo $this->Form->input('qualification_remarks', array(
								'type' => 'textarea',
								'maxlength' => '50',
								'rows' => '3',
								'cols' => '2',
							    'div' => 'form-group',  
							    'class' => 'form-control chinesechinese-input',
							    'label' => array(
							    	'class' => 'control-label',
							    	'text' => __('簡短自我介紹')
							    	),    
							    'placeholder' => __('中文：20字 / English: 50 Characters')
							)); ?>	
						</div>
					</div>
					<hr class="devider devider-dotted">	
					<?php if($post['Post']['rate'] == '導師自訂'): ?>		
						<div class="row">
							<div class="col-lg-12">
								<?php echo __('導師自訂學費為：'); ?>			
							</div>
						</div>	
						<div class="row">
							<div class="col-lg-8">
								<?php echo $this->Form->input('rate_remarks', array(
									'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
									'div' => 'nothing',
									'between' => '<div class="input-group"><span class="input-group-addon">$</span>',
									'type' => 'text',
						    		'class' => 'form-control',
						    		'placeholder' => __('學費'),
						    		'after' => '</div>'
								)); ?>		
							</div>
							<div class="col-lg-4">
								<?php echo $this->Form->input('rate_remarks_unit', array(
								    'options' => $select_rate,
								    'div' => 'form-group',
									//'label' => array(
									//	'class' => 'control-label',
									//	'text' => __('單位')							
									//	), 
								    'class' => 'form-control'	
								)); ?>
							</div>
						</div>	
					<?php else: ?>
						<div class="row">
							<div class="col-lg-12">
								<?php echo $this->Form->input('rate_not_ok', array(
									'format' => array('before', 'input', 'between', 'label', 'after', 'error'),
									'div' => 'checkbox',
									'type' => 'checkbox', 
									'before' => '<label for="CommentRateOk">',
									'after' => __('另建議學費（如適用）：', true) . '</label>',
									'class' => 'checkbox',
									'required' => false,
									//'hiddenField' => false, 
									'value' => '1'
								)); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<fieldset id="test2">
								<?php echo $this->Form->input('rate_remarks', array(
									'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
									'div' => 'nothing',
									//'label' => array(
									//	'class' => 'control-label',								
									//	'text' => __('學費（不填寫代表希望由導師自訂）') . '<a role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" class="pull-right">' . __('學費參考') . '</a>'
									//	),
									'between' => '<div class="input-group"><span class="input-group-addon">$</span>',
									'type' => 'text',
							    	'class' => 'form-control',
							    	'errorMessage' => false,
							    	'placeholder' => __('學費'),
							    	'after' => '<span class="input-group-addon">' . $post['Post']['rate_unit'] . '</span></div>'
								)); ?><br>
								</fieldset>
							</div>
						</div>	
						<input type="hidden" name="data[Comment][rate_remarks_unit]" value="<?php echo $post['Post']['rate_unit']; ?>"/>	
					<?php endif; ?>													
					<p>
						<?php echo $this->Form->input('frequency_not_ok', array(
							'format' => array('before', 'input', 'between', 'label', 'after', 'error'),
							'div' => 'checkbox',
							'type' => 'checkbox', 
							'before' => '<label for="CommentFrequencyOk">',
							'after' => __('另建議上課頻率（如適用）：', true) . '</label>',
							'class' => 'checkbox',
							//'hiddenField' => false, 
							'required' => false,
							'value' => '1'
						)); ?>
					</p>
					<div class="row">
						<fieldset id="test">	
							<div class="col-lg-6">
								<?php echo $this->Form->input('frequency_remarks', array(
								    'options' => $select_frequency,
								    'empty' => __('請選擇'),
								    'div' => 'form-group',
								    'errorMessage' => false,
								    'class' => 'form-control',
									//'label' => array(
									//	'class' => 'control-label',								
									//	'text' => __('每週上課次數')
									//	)
								)); ?>
							</div>		
							<div class="col-lg-6">
								<?php echo $this->Form->input('duration_remarks', array(
								    'options' => $select_duration,
								    'empty' => __('請選擇'),
								    'div' => 'form-group',
								    'errorMessage' => false,
								    'class' => 'form-control',
									//'label' => array(
									//	'class' => 'control-label',								
									//	'text' => __('每週上課次數')
									//	)
								)); ?>
							</div>
						</fieldset>
					</div>
					<div class="row">
						<div class="col-lg-12">
						<?php
						$options = array(
							'label' => __('刊登'),
							'class' => 'btn btn-primary btn-lg pull-right', 
							'div' => false
						);
						echo $this->Form->end($options); 
						?>
						</div>
					</div>										
				</div>
			</div>
		</div>
		<!-- End Reply-->
	</div>
	<br>
	<div class="row">
		<div class="col-lg-8">
			<div class="headline">
				<h1><?php echo __('應徵留言'); ?></h1>
			</div>			
		</div>
	</div>
	<!-- Comments -->	
	<?php foreach ($comments as $comment): ?>	
		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-4">
								<p>刊登日期：<span class="label rounded label-u"><?php echo h($this->Time->format('Y年m月j日', $comment['Comment']['created'])); ?></span></p>
								<p>導師類型：<span class="label rounded label-u"><?php echo h($comment['Comment']['tutor_type']); ?></span></p>
								<p>性別：<span class="label rounded label-u"><?php echo h($comment['Comment']['tutor_gender']); ?></span> </p>
								<p>學費：<span class="label rounded label-u"><?php if ($comment['Comment']['rate_not_ok'] == true) { echo $comment['Comment']['rate_remarks']; echo $comment['Comment']['rate_remarks_unit']; } else { echo $post['Post']['rate']; echo $post['Post']['rate_unit']; } ?></span></p>	
								<?php if ($comment['Comment']['frequency_not_ok'] == true): ?>
								<p>上課頻率：<span class="label rounded label-u"><?php echo __('每星期') ?><?php echo $comment['Comment']['frequency_remarks']; ?><?php echo __('堂') ?></span> <span class="label rounded label-u"><?php echo __('每堂'); ?><?php echo $comment['Comment']['duration_remarks']; ?><?php echo __('小時'); ?></span></p>	
								<?php endif; ?>						
							</div>
							<div class="col-lg-8">
								<p><span class="label rounded label-u"><?php echo h($comment['Comment']['tag1']); ?></span> <span class="label rounded label-u"><?php echo h($comment['Comment']['tag2']); ?></span></p>
								<p><?php echo $comment['Comment']['qualification_remarks']; ?></p>
							</div>
						</div>					
					</div>				
				</div>
			</div>	
		</div>
	<?php endforeach; ?>
	<!-- End Comments -->	
	<?php echo $this->element('paging'); ?>
</div>

<?php else: ?><!-- If postOwner is TRUE -->

<div class="container">	
	<div class="row">
		<div class="col-lg-8">
			<div class="headline">
				<h1><?php echo __('選擇您的導師'); ?></h1>
			</div>
			<!-- Comments -->	
			<?php foreach ($comments as $comment): ?>	
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-4">
										<p><?php echo __('刊登日期：'); ?><span class="label rounded label-u"><?php echo h($this->Time->format('Y年m月j日', $comment['Comment']['created'])); ?></span></p>
										<p><?php echo __('導師類型：'); ?><span class="label rounded label-u"><?php echo h($comment['Comment']['tutor_type']); ?></span></p>
										<p><?php echo __('性別：'); ?><span class="label rounded label-u"><?php echo h($comment['Comment']['tutor_gender']); ?></span> </p>
										<p><?php echo __('學費：'); ?><span class="label rounded label-u"><?php if ($comment['Comment']['rate_not_ok'] == true) { echo $comment['Comment']['rate_remarks']; echo $comment['Comment']['rate_remarks_unit']; } else { echo $post['Post']['rate']; echo $post['Post']['rate_unit']; } ?></span></p>	
										<?php if ($comment['Comment']['frequency_not_ok'] == true): ?>
										<p><?php echo __('上課頻率：'); ?><span class="label rounded label-u"><?php echo __('每星期') ?><?php echo $comment['Comment']['frequency_remarks']; ?><?php echo __('堂') ?></span> <span class="label rounded label-u"><?php echo __('每堂'); ?><?php echo $comment['Comment']['duration_remarks']; ?><?php echo __('小時'); ?></span></p>	
										<?php endif; ?>
									</div>
									<div class="col-lg-8">
										<p><span class="label rounded label-u"><?php echo h($comment['Comment']['tag1']); ?></span> <span class="label rounded label-u"><?php echo h($comment['Comment']['tag2']); ?></span></p>
										<p><?php echo $comment['Comment']['qualification_remarks']; ?></p>
									</div>
								</div>					
							</div>
							<div class="row">
								<div class="col-lg-4 col-lg-offset-8">
									<?php echo $this->Html->link(__('Select'), array('controller' => 'orders', 'action' => 'preview', $post['Post']['id'], $comment['Comment']['id']), array('class' => 'btn-u btn-block')); ?>			
									
								</div>

							</div>
						</div>
					</div>	
				</div>
			<?php endforeach; ?>
			<!-- End Comments -->	
		</div>
		<div class="col-lg-4">
			<!-- Case -->
			<div class="headline">
				<h1><?php echo __('個案資料'); ?></h1>
				<p><strong><?php echo __('刊登日期：'); ?></strong><?php echo $this->Time->format(__('Y年m月j日'), $post['Post']['created']); ?></p>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<h4><i class="fa fa-clock-o"></i><?php echo __('時間'); ?></h4>
					<?php if(!empty($post['FirstCondition']['week'])) : ?>
						<p><strong><?php echo __('首堂合適時間：'); ?></strong></p>
						<p><?php echo $this->String->checkStartDate($post['Post']['created'], $post['Post']['first'], 'FirstCondition');?> <?php echo $post['FirstCondition']['week']; ?> <span class="text-border text-border-green tooltips" data-toggle="tooltip" data-original-title="<?php echo __('最早開始時間'); ?>"><?php echo $this->Time->format('h:i A', $post['FirstCondition']['start']); ?></span> <?php echo __('至'); ?> <span class="text-border text-border-green tooltips" data-toggle="tooltip" data-original-title="<?php echo __('最遲結束時間'); ?>"><?php echo $this->Time->format('h:i A', $post['FirstCondition']['end']); ?></span></p>
						<p><strong><?php echo __('其後合適時間：'); ?></strong><?php echo $this->Coma->coma($post['Condition'], 'condition'); ?></p>
					<?php else: ?>	
						<p><strong><?php echo __('合適時間：'); ?></strong><?php echo $this->Coma->coma($post['Condition'], 'condition', $postOwner); ?></p>
					<?php endif; ?>
					<p><strong><?php echo __('上課頻率：'); ?></strong></p>
					<p><?php echo __('每星期') ?><?php echo $post['Post']['frequency']; ?><?php echo __('堂') ?><?php echo __('，'); ?><?php echo __('每堂'); ?><?php echo $post['Post']['duration']; ?><?php echo __('小時'); ?></p>
					<hr class="devider devider-dotted">
					<h4><i class="fa fa-folder-open"></i><?php echo __('學生資料'); ?></h4>
					<p><strong><?php echo __('科目：'); ?></strong><?php echo $post['Post']['student_grade']; ?>&nbsp;<?php echo $this->Coma->coma($post['Subject'], 'index'); ?>&nbsp;<?php echo $number; ?></p>
					<p><strong><?php echo __('上課地點：'); ?></strong><?php echo $post['Post']['district']; ?>&nbsp;<?php echo $post['Post']['estate']; ?></p>
					<?php if(!empty(h($post['ExtraRequirement']))): ?>	
						<p><strong><?php echo __('其他要求：'); ?></strong></p>
						<p><?php echo $this->Coma->coma($post['ExtraRequirement'], 'extra'); ?></p>
					<?php endif; ?>	
					<hr class="devider devider-dotted">
					<h4><i class="fa fa-pencil"></i><?php echo __('導師要求'); ?></h4>
					<p><strong><?php echo __('類型：'); ?></strong><?php echo $post['Post']['tutor_type']; ?></p>
					<p><strong><?php echo __('性別：'); ?></strong><?php echo $post['Post']['tutor_gender']; ?></p>	
					<p><strong><?php echo __('學費：'); ?></strong><?php echo $post['Post']['rate']; ?><?php if ($post['Post']['rate'] !== '導師自訂') { echo $post['Post']['rate_unit']; } else { ?>&nbsp;<?php } ?></p>	
				</div>								
			</div>
			<!-- End Case -->
		</div>
	</div>
	<?php echo $this->element('paging'); ?>	
</div>	
<?php endif; ?>