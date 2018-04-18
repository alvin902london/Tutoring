<?php echo $this->element('posts_form_head'); ?>
<?php echo $this->Form->create('Profile', array(    
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
				<h3><?php echo __('個人資料'); ?></h3>
			</div>
		</div>	
		<div class="row">
			<div class="col-lg-4">
				<?php echo $this->Form->input('full_name_en', array(
					'div' => 'form-group',
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',
						'text' => __('英文全名（與身份證相同）')
						),
					'placeholder' => __('聯絡人姓名')
				)); ?>
			</div>
			<div class="col-lg-4">
				<?php echo $this->Form->input('full_name_chi', array(
					'div' => 'form-group',
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',
						'text' => __('中文全名（與身份證相同）')
						),
					'placeholder' => __('聯絡人姓名')
				)); ?>	
			</div>
			<div class="col-lg-4">
				<?php echo $this->Form->input('nickname', array(
					'div' => 'form-group',
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',
						'text' => __('暱稱')
						),
					'placeholder' => __('暱稱')
				)); ?>	
			</div>			
		</div>	
		<div class="row">
			<div class="col-lg-6">
				<?php echo $this->Form->input('gender', array(
					'div' => 'form-group',
					'empty' => __('請選擇'),			
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',
						'text' => __('性別')
						),
					'options' => $select_gender
				)); ?>	
			</div>
			<div class="col-lg-6">
				<?php echo $this->Form->input('birth_year', array(
					'div' => 'form-group',
					'empty' => __('請選擇'),			
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',
						'text' => __('出生年份')
						),
					'options' => $select_year
				)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<?php echo $this->Form->input('User.mobile', array(
					'type' => 'text',
					'div' => 'form-group',
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',
						'text' => __('手提電話')
						),
					'placeholder' => __('手提電話')
				)); ?>	
			</div>
			<div class="col-lg-6">
				<?php echo $this->Form->input('identity', array(
					'div' => 'form-group',
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',
						'text' => __('身份證號碼')
						),
					'placeholder' => __('身份證號碼')
				)); ?>	
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<?php echo $this->Form->input('district', array(
					'options' => $select_districts,
					'empty' => __('請選擇'),
					'div' => 'form-group',
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',								
						'text' => __('居住地區')
						)     
				)); ?>
			</div>
			<div class="col-lg-8">
				<?php echo $this->Form->input('estate', array(
					'div' => 'form-group',
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',								
						'text' => __('屋苑（如不適用，請填寫街道號碼或地點）')
						),
					'placeholder' => __('屋苑')
				)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php echo $this->Form->input('address', array(
					'div' => 'form-group',
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',
						'text' => __('詳細地址')
						),
					'placeholder' => __('詳細地址')
				)); ?>			 
			</div>
		</div>		
		<div class="row">
			<div class="col-lg-12">
				<h3><?php echo __('資歷'); ?></h3>
				<?php echo $this->Form->input('tutor_type', array(
					'options' => $select_profile_tutor_type,
					'empty' => __('請選擇'),
					'label' => array(
						'class' => 'control-label',
						'text' => __('導師類型')
						),
					'div' => 'form-group',
					'class' => 'form-control'
				)); ?>
			</div>
		</div>	
		<div class="row">
			<div class="col-lg-4">
				<?php echo $this->Form->input('tutor_type_education', array(
					'options' => $select_profile_tutor_type_education,
					'empty' => __('請選擇'),
					'label' => array(
						'class' => 'control-label',
						'text' => __('最高教育程度')
						),
					'div' => 'form-group',
					'class' => 'form-control'
				)); ?>
			</div>
			<div class="col-lg-4">
				<?php echo $this->Form->input('tutor_type_music', array(
					'options' => $select_profile_tutor_type_music,
					'empty' => __('請選擇'),
					'label' => array(
						'class' => 'control-label',
						'text' => __('音樂（如適用）')
						),
					'div' => 'form-group',
					'class' => 'form-control'
				)); ?>
			</div>
			<div class="col-lg-4">	
				<?php echo $this->Form->input('tutor_type_language', array(
					'options' => $select_profile_tutor_type_language,
					'empty' => __('請選擇'),
					'label' => array(
						'class' => 'control-label',
						'text' => __('會話（如適用）')
						),
					'div' => 'form-group',
					'class' => 'form-control'
				)); ?>				
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<?php echo $this->Form->input('tutor_type_education', array(
					'options' => $select_profile_tutor_type_education,
					'empty' => __('請選擇'),
					'label' => array(
						'class' => 'control-label',
						'text' => __('最高教育程度')
						),
					'div' => 'form-group',
					'class' => 'form-control'
				)); ?>
			</div>
			<div class="col-lg-4">
				<?php echo $this->Form->input('tutor_type_music', array(
					'options' => $select_profile_tutor_type_music,
					'empty' => __('請選擇'),
					'label' => array(
						'class' => 'control-label',
						'text' => __('音樂（如適用）')
						),
					'div' => 'form-group',
					'class' => 'form-control'
				)); ?>
			</div>
			<div class="col-lg-4">	
				<?php echo $this->Form->input('tutor_type_language', array(
					'options' => $select_profile_tutor_type_language,
					'empty' => __('請選擇'),
					'label' => array(
						'class' => 'control-label',
						'text' => __('會話（如適用）')
						),
					'div' => 'form-group',
					'class' => 'form-control'
				)); ?>				
			</div>
		</div>	
		<div class="row">
			<div class="col-lg-4">
				<?php echo $this->Form->input('Topic.0.topic', array(
					'options' => $select_subjects,
					'empty' => __('請選擇'),
					'label' => array(
						'class' => 'control-label',
						'text' => __('可教授科目')
						),
					'div' => 'form-group',
					'class' => 'form-control'
				)); ?>
			</div>
			<div class="col-lg-4">
				<?php echo $this->Form->input('Topic.0.min', array(
					'options' => $select_grade,
					'empty' => __('請選擇'),
					'label' => array(
						'class' => 'control-label',
						'text' => __('程度')
						),
					'div' => 'form-group',
					'class' => 'form-control'
				)); ?>
			</div>
			<div class="col-lg-4">	
				<?php echo $this->Form->input('Topic.0.max', array(
					'options' => $select_grade,
					'empty' => __('請選擇'),
					'label' => array(
						'class' => 'control-label',
						'text' => __('程度')
						),
					'div' => 'form-group',
					'class' => 'form-control'
				)); ?>			
			</div>
		</div>			
		<div class="row">
			<div class="col-lg-12">
				<?php echo $this->Form->input('tag', array(
					'type' => 'text',
					'div' => 'form-group',
					'class' => 'form-control',
					'label' => array(
						'class' => 'control-label',
						'text' => __('宣傳標語')
						),
					'placeholder' => __('宣傳標語')
				)); ?>	
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p><?php echo __('Example'); ?></p>
				<div class="well">
					<p>Your Reply to Job Offer</p>
					<p>Your tagline goes to here</p>
					<p>Content of Reply</p>
				</div>
			</div>
		</div>	 
<!-- To display JS var value: <div class="results"></div> --> <div class="results"></div>
		<div class="row">
			<div class="col-lg-12">
				<?php 
				$options = array(
					'label' => __('下一步'),
					'class' => 'btn btn-default pull-right', 
					'div' => array(
						'class' => 'form-group'
					)
				);
				echo $this->Form->end($options); ?>
			</div>
		</div>					
	</div>
</div>

<br>
<script>
$(function(){
	//This is to filter the selection of grades based on the subject the customer chooses.
	$('#Topic0Topic').on('change', function(){
		var val = $("#Topic0Topic option:selected").val();
		var sub = $('#Topic0Min');
		var sub2 = $('#Topic0Max');
		//document.querySelector('.results').innerHTML = val;
		$('option', sub).filter(function(){
			
			if (
				(val == '29') && ($(this).val() == '1')
				//|| $(this).attr('label') === 'SHOW'
			) {
				console.log($(this).parent('span').length);
			  	if ($(this).parent('span').length) {
					$(this).unwrap();
			  	}
			} else {
				console.log($(this).parent('span').length);
			  	if (!$(this).parent('span').length) {
					$(this).wrap( "<span>" ).parent().hide();
			  	}
			}
		});
		$('option', sub2).filter(function(){
			if (
				(val === '29' || '30') && ($(this).attr('value') === '1' || '2' || '3' || '4' || '5' || '6')
			  	//|| $(this).attr('label') === 'SHOW'
			) {
			  	if ($(this).parent('span').length) {
					$(this).unwrap();
			  	}
			} else {
			  	if (!$(this).parent('span').length) {
					$(this).wrap( "<span>" ).parent().hide();
			  	}
			}
		});        
	});
	//$('#groups').trigger('change');

	$('#Topic0Min').on('change', function(){
		var val = $(this).val();
		var sub = $('#Topic0Max');
		//document.querySelector('.results').innerHTML = val;
		$('option', sub).filter(function(){
			if (
				 $(this).val() === val
			  || $(this).val() > val
			  || $(this).val() === ''
			) {
			  if ($(this).parent('span').length) {
				$(this).unwrap();
			  }
			} else {
			  if (!$(this).parent('span').length) {
				$(this).wrap( "<span>" ).parent().hide();
			  }
			}
		});
	});
	//$('#groups').trigger('change');

	$('#Topic0Max').on('change', function(){
		var val = $(this).val();
		var sub = $('#Topic0Min');
		//document.querySelector('.results').innerHTML = val;
		$('option', sub).filter(function(){
			if (
				 $(this).val() === val
			  || $(this).val() < val
			  || $(this).val() === ''
			) {
			  if ($(this).parent('span').length) {
				$(this).unwrap();
			  }
			} else {
			  if (!$(this).parent('span').length) {
				$(this).wrap( "<span>" ).parent().hide();
			  }
			}
		});
	});
	//$('#groups').trigger('change');    
});
</script>