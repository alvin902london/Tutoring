<?php echo $this->Form->create('Order', array(    
	'inputDefaults' => array(
		'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
		'label' => false,
		'div' => false,
		'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))
	)   
)); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="page-header">
			<h1><?php echo __('Accept/Reject Offer'); ?></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<?php
		$options = array(
			'name' => 'btn2',
			'class' => 'btn btn-primary btn-lg pull-right'
		);
		echo $this->Form->submit('Reject', $options); ?>
	</div>
	<div class="col-lg-6">	
		<?php
		$options = array(
			'name' => 'btn',
			'class' => 'btn btn-primary btn-lg pull-left'
		);
		echo $this->Form->submit('Accept', $options);	
		echo $this->Form->end(); 
		?>
	</div>
</div>