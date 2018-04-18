<div class="container">
	<?php if (isset($from)) : ?>
		<?php echo $this->element('posts_form_head'); ?>
	<?php else : ?>	
		<div class="page-header">
			<h1><?php echo __('登入'); ?></h1>
		</div>	
	<?php endif; ?>	
	<?php
	echo $this->Form->create('User', array(
	    'url' => array(
	        'controller' => 'users',
	        'action' => 'login'
	    ),
		'class' => 'form-signin',
		'inputDefaults' => array(
			'label' => false, 
			'div' => false
		)   
	));
	echo $this->Form->input('username', array(
		'placeholder' => 'username', 
		'class' => 'form-control'
	)); 
	echo $this->Form->input('password', array(
		'placeholder' => 'password', 
		'class' => 'form-control', 
		'type' => 'password'
		)); 
	?>
	<?php if (isset($from) && $from == 'post') : ?>
		<input type="hidden" name="data[role]" value="post"/>
	<?php elseif (isset($from) && $from == 'profile') : ?>
		<input type="hidden" name="data[role]" value="profile"/>			
	<?php endif; ?>
	<?php
	$options = array(
		'label' => 'Login',
		'class' => 'btn btn-default', 
		'div' => array(
			'class' => 'form-group'
		)
	);
	echo $this->Form->end($options);
	?>			
</div>