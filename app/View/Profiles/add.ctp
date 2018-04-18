<div class="row">
	<div class="col-lg-6">
		<?php echo $this->Form->create('Profile', array(    
			'inputDefaults' => array(
				'format' => array('before', 'label', 'between', 'input', 'after', 'error'),		
				'label' => true,
				'div' => false,
				'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))
			)   
		)); ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<h3><?php echo __('基本資料'); ?></h3>
		<!-- Basic Login Information -->
		<?php echo $this->Form->input('User.username', array(
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => array(
		    	'class' => 'control-label',
		    	'text' => __('電郵地址（必須有效）')
		    	),
		    'placeholder' => __('電郵地址')
		)); ?> <!-- same as email -->
		<?php echo $this->Form->input('User.password', array(
			'type' => 'password',			
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => array(
		    	'class' => 'control-label',
		    	'text' => __('密碼')
		    	),
		    'placeholder' => __('密碼')
		)); ?> 
		<?php echo $this->Form->input('User.confirm_password', array(
			'type' => 'password',
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => array(
		    	'class' => 'control-label',
		    	'text' => __('確認密碼')
		    	),
		    'placeholder' => __('確認密碼')
		)); ?>
		<?php echo $this->Form->input('User.contact_person', array(
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => array(
		    	'class' => 'control-label',
		    	'text' => __('聯絡人姓名')
		    	),
		    'placeholder' => __('聯絡人姓名')
		)); ?>	
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<h3><?php echo __('個人資料'); ?></h3>
		<?php echo $this->Form->input('full_name_en', array(
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => array(
		    	'class' => 'control-label',
		    	'text' => __('英文全名（與身份證相同）')
		    	),
		    'placeholder' => __('聯絡人姓名')
		)); ?>
		<?php echo $this->Form->input('full_name_chi', array(
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => array(
		    	'class' => 'control-label',
		    	'text' => __('中文全名（與身份證相同）')
		    	),
		    'placeholder' => __('聯絡人姓名')
		)); ?>	
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
		<?php echo $this->Form->input('identity', array(
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => array(
		    	'class' => 'control-label',
		    	'text' => __('身份證號碼')
		    	),
		    'placeholder' => __('身份證號碼')
		)); ?>			
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
		<?php echo $this->Form->input('estate', array(
		    'div' => 'form-group',
		    'class' => 'form-control',
    		'label' => array(
    			'class' => 'control-label',								
				'text' => __('屋苑（如不適用，請填寫街道號碼或地點）')
				),
		    'placeholder' => __('屋苑')
		)); ?>
		<?php echo $this->Form->input('address', array(
		    'div' => 'form-group',
		    'class' => 'form-control',
		    'label' => array(
		    	'class' => 'control-label',
		    	'text' => __('詳細地址')
		    	),
		    'placeholder' => __('詳細地址')
		)); ?>
		<?php echo $this->Form->input('mobile', array(
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
</div>
<div class="row">
	<div class="col-lg-6">
		<h3><?php echo __('資歷'); ?></h3>		
		<?php echo $this->Form->input('tutor_type', array(
		    'options' => $select_tutor_type,
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
	<div class="col-lg-6">
		<h3><?php echo __('可教授科目'); ?></h3>							
		<?php echo $this->Form->input('Subject', array(
			'options' => $select_subjects,
			'class' => 'checkbox-inline no_indent',
			'type' => 'select',
			'multiple' => 'checkbox',
			'between' => '<div class="form-group has-error required has-feedback">',
			'after' => '</div>'
		)); ?>
		<div class="form-group has-error required has-feedback">
			<?php echo $this->Form->error('Subject', null, array('class' => 'help-block')); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
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
<br>