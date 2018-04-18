<?php if (!empty($post['Post']['student_number'])) {
	$number = __('（小組') . h($post['Post']['student_number']) . __('人）');
} else {
	$number = '';
} 

if ($comment['Comment']['frequency_not_ok'] == true) {
	$frequency = __('每星期') . $comment['Comment']['frequency_remarks'] . __('堂，每堂') . $comment['Comment']['duration_remarks'] . __('小時');
} else {
	$frequency = __('每星期') . $post['Post']['frequency'] . __('堂，每堂') . $post['Post']['duration'] . __('小時');
}
?>
<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<div class="headline">
				<h1>Payment</h1>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<?php echo $this->Form->create('Order', array(    
						'inputDefaults' => array(
							'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
							'label' => false,
							'div' => false,
							'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))
						)   
					)); ?>						
				</div>
			</div>
			<div class="headline">
				<h1>About You</h1>
				<p class="help-block"><?php echo __('It looks like you’re new to After School. If your request is accepted, XXX will need your contact information. Make sure your phone is nearby before continuing.'); ?></p>
			</div>	
			<div class="row">
				<div class="col-lg-6">
					<?php echo $this->Form->input('subject', array(
					    'div' => 'form-group',
					    'class' => 'form-control',
					    'label' => array(
					    	'class' => 'control-label',
					    	'text' => __('Subject')
					    	),
					    'placeholder' => __('Subject')
					)); ?>	
				</div>
				<div class="col-lg-6">
					<?php echo $this->Form->input('level', array(
					    'div' => 'form-group',
					    'class' => 'form-control',
					    'label' => array(
					    	'class' => 'control-label',
					    	'text' => __('Level')
					    	),
					    'placeholder' => __('Level')
					)); ?>	
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12">
					<?php
					$options = array(
						'label' => __('Place Order'),
						'class' => 'btn-u btn-u-lg pull-right', 
						//'div' => array(
						//	'class' => 'form-group'
						//)
					);
					echo $this->Form->end($options); 
					?>	
					<p><?php echo __('You will only be charged if the teacher accepts your request. They’ll have 24 hours to reply. If the host declines or does not respond, no charge is made.'); ?></p>	
				</div>
			</div>			
		</div>
		<div class="col-lg-4">
			<div class="headline">
				<h3><?php echo __('您的補習配對'); ?></h3>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<h4><i class="fa fa-clock-o"></i><?php echo __('時間'); ?></h4>
					<?php if(!empty($post['FirstCondition']['week'])) : ?>
						<p><strong><?php echo __('首堂合適時間：'); ?></strong></p>
						<p><?php echo $this->String->checkStartDate($post['Post']['created'], $post['Post']['first'], 'FirstCondition');?> <?php echo $post['FirstCondition']['week']; ?> <span class="text-border text-border-green tooltips" data-toggle="tooltip" data-original-title="<?php echo __('最早開始時間'); ?>"><?php echo $this->Time->format('h:i A', $post['FirstCondition']['start']); ?></span> <?php echo __('至'); ?> <span class="text-border text-border-green tooltips" data-toggle="tooltip" data-original-title="<?php echo __('最遲結束時間'); ?>"><?php echo $this->Time->format('h:i A', $post['FirstCondition']['end']); ?></span></p>
						<p><strong><?php echo __('其後合適時間：'); ?></strong></p>
						<p><?php echo $this->Coma->coma($post['Condition'], 'condition', true); ?></p>
					<?php else: ?>
						<p><strong><?php echo __('首堂日期：'); ?></strong><?php echo $this->String->checkStartDate($post['Post']['created'], $post['Post']['first'], 'first'); ?></p>
						<p><strong><?php echo __('合適時間：'); ?></strong><?php echo $this->Coma->coma($post['Condition'], 'condition', true); ?></p>
					<?php endif; ?>
					<p><strong><?php echo __('上課頻率：'); ?></strong></p>
					<p><?php echo $frequency; ?></p>
					<hr class="devider devider-dotted">
					<h4><i class="fa fa-folder-open"></i><?php echo __('學生資料'); ?></h4>
					<p><strong><?php echo __('教授科目：'); ?></strong><?php echo $post['Post']['student_grade']; ?>&nbsp;<?php echo $this->Coma->coma($post['Subject'], 'index'); ?>&nbsp;<?php echo $number; ?></p>
					<p><strong><?php echo __('授課地區：'); ?></strong><?php echo $post['Post']['district']; ?>&nbsp;<?php echo $post['Post']['estate']; ?></p>
					<?php if(!empty(h($post['ExtraRequirement']))): ?>	
						<p><strong><?php echo __('其他要求：'); ?></strong></p>
						<p><?php echo $this->Coma->coma($post['ExtraRequirement'], 'extra'); ?></p>
					<?php endif; ?>	
					<hr class="devider devider-dotted">
					<h4><i class="fa fa-pencil"></i><?php echo __('導師資料'); ?></h4>
					<p><strong><?php echo __('類型：'); ?></strong><?php echo $profile['tutor_type']; ?></p>
					<p><strong><?php echo __('性別：'); ?></strong><?php echo $profile['gender']; ?></p>	
					<p><strong><?php echo __('學費：'); ?></strong><?php if ($comment['Comment']['rate_not_ok'] == true) { echo $comment['Comment']['rate_remarks']; echo $comment['Comment']['rate_remarks_unit']; } else { echo $post['Post']['rate']; echo $post['Post']['rate_unit']; } ?></p>	
					<p><strong><?php echo __('簡短自我介紹：'); ?></strong></p>
					<p><span class="label rounded label-u"><?php echo $comment['Comment']['tag1']; ?></span> <span class="label rounded label-u"><?php echo $comment['Comment']['tag2']; ?></span></p><p><?php echo $comment['Comment']['qualification_remarks']; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
