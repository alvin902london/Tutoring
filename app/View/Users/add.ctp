<?php if (isset($from)) : ?>
	<?php echo $this->element('posts_form_head'); ?>
<?php endif; ?>	
<br>
<div class="container">
<div class="row">
	<div class="col-lg-4 col-lg-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Registration</h3>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('User', array(    
					'inputDefaults' => array(
						'format' => array('before', 'label', 'input', 'between', 'error', 'after'),		
						'label' => false,
						'div' => false,
						'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))
					)   
				)); ?>		
				<?php echo $this->Form->input('contact_person', array(
				    'div' => 'form-group',
				    'class' => 'form-control',
				    //'disabled' => $disabled,
				    'label' => array(
				    	'class' => 'control-label',
				    	'text' => __('您的名字')
				    	),
				    'placeholder' => __('您的名字')
				)); ?>
				<?php echo $this->Form->input('username', array(
				    'div' => 'form-group',  
				    'class' => 'form-control',
				    //'disabled' => $disabled,
				    'label' => array(
				    	'class' => 'control-label',
				    	'text' => __('電郵地址（必須有效）')
				    	),    
				    'placeholder' => __('電郵地址')
				)); ?>
				<?php echo $this->Form->input('password', array(
				    'div' => 'form-group',
				    'type' => 'password',	    
				    'class' => 'form-control',
				    'label' => array(
				    	'class' => 'control-label',
				    	'text' => __('密碼')
				    	),    
				    'placeholder' => __('密碼')
				)); ?>	
				<?php echo $this->Form->input('confirm_password', array(
				    'div' => 'form-group',
				    'type' => 'password',	    
				    'class' => 'form-control',
				    'label' => array(
				    	'class' => 'control-label',
				    	'text' => __('確認密碼')
				    	),    
				    'placeholder' => __('確認密碼')
				)); ?>
			</div>				
			<?php if (isset($from) && $from == 'post') : ?>
				<input type="hidden" name="data[User][role]" id="UserRole_" value="Hire"/>
			<?php elseif (isset($from) && $from == 'profile') : ?>
				<input type="hidden" name="data[User][role]" id="UserRole_" value="Teach"/>			
			<?php else : ?>
				<div class="panel-body text-center">
					<input type="hidden" name="data[User][role]" id="UserRole_" value=""/><!-- Please modify manually if 'role' field is updated -->
					<?php echo $this->Form->label('role', 'I want to'); ?><br>
					<?php echo $this->Form->input('role', array(
						'autocomplete' => 'off',
						'legend' => false,
					    'div' => array(
					    	'class' => 'btn-group',
					    	'data-toggle' => 'buttons' 
					    ),
					    'hiddenField' => false,
					    'type' => 'radio',	
						'required' => false,    
					    'options' => array(
					    	__('Hire') => __('Hire'),
					    	__('Teach') => __('Teach')
					    ),
					    'before' => '<label class="btn btn-default">',
					    'separator' => '</label><label class="btn btn-default">',
					    'between' => '</label>',
					    'errorMessage' => false
					)); ?>
				</div>
				<div class="panel-body text-center has-error">	
					<?php echo $this->Form->error('role', array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))); ?>
				</div>	
			<?php endif; ?>
			<div class="panel-body">	
				<?php $options = array(
					'label' => __('Sign Up'),
					'class' => 'btn btn-default pull-right', 
					'div' => array(
						'class' => 'form-group'
					)
				);
				echo $this->Form->end($options); ?>	
			</div>
			<?php if (isset($from)) : ?>
				<div class="panel-footer">
					<div class="help-block"><?php echo __('Already a member?'); ?> <?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login', 'ref' => $from)); ?></div>
				</div>
			<?php else : ?>
				<div class="panel-footer">
					<div class="help-block"><?php echo __('Already a member?'); ?> <?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')); ?></div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>