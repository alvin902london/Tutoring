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
						<tr>
							<th class="col-md-5"><?php echo __('電郵地址'); ?></th>
							<td><?php echo AuthComponent::user('username'); ?></td>
						</tr>
						<tr>
							<th class="col-md-5"><?php echo __('英文全名（與身份證相同）'); ?></th>
							<td><?php echo $source['Profile']['full_name_en']; ?></td>
						</tr>	
						<tr>
							<th class="col-md-5"><?php echo __('中文全名（與身份證相同）'); ?></th>
							<td><?php echo $source['Profile']['full_name_chi']; ?></td>
						</tr>
						<tr>
							<th class="col-md-5"><?php echo __('性別'); ?></th>
							<td><?php echo $source['Profile']['gender']; ?></td>
						</tr>												
						<tr>
							<th class="col-md-5"><?php echo __('出生年份'); ?></th>
							<td><?php echo $source['Profile']['birth_year']; ?></td>
						</tr>												
						<tr>
							<th class="col-md-5"><?php echo __('身份證號碼'); ?></th>
							<td><?php echo $source['Profile']['identity']; ?></td>
						</tr>												
						<tr>
							<th class="col-md-5"><?php echo __('居住地區'); ?></th>
							<td><?php echo $source['Profile']['district']; ?></td>
						</tr>												
						<tr>
							<th class="col-md-5"><?php echo __('屋苑'); ?></th>
							<td><?php echo $source['Profile']['estate']; ?></td>
						</tr>												
						<tr>
							<th class="col-md-5"><?php echo __('詳細地址'); ?></th>
							<td><?php echo $source['Profile']['address']; ?></td>
						</tr>												
						<tr>
							<th class="col-md-5"><?php echo __('導師類型'); ?></th>
							<td><?php echo $source['Profile']['tutor_type']; ?></td>
						</tr>												
						<tr>
							<th class="col-md-5"><?php echo __('最高教育程度'); ?></th>
							<td><?php echo $source['Profile']['tutor_type_education']; ?></td>
						</tr>
						<?php if(!empty($source['Profile']['tutor_type_music'])) : ?>
						<tr>
							<th class="col-md-5"><?php echo __('最高教育程度：音樂'); ?></th>
							<td><?php echo $source['Profile']['tutor_type_music']; ?></td>
						</tr>	
						<?php endif; ?>							
						<?php if(!empty($source['Profile']['tutor_type_language'])) : ?>											
						<tr>
							<th class="col-md-5"><?php echo __('最高教育程度：會話'); ?></th>
							<td><?php echo $source['Profile']['tutor_type_language']; ?></td>
						</tr>												
						<?php endif; ?>	
						<tr>
							<th class="col-md-5"><?php echo __('可教授科目'); ?></th>
							<td><?php echo $this->Coma->coma($subjects, 'preview'); ?></td>
						</tr>	
						<tr>
							<th class="col-md-5"><?php echo __('宣傳標語'); ?></th>
							<td><?php echo $source['Profile']['tag']; ?></td>
						</tr>																	
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
			    		'text' => __('請問您如何得知我們？')
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
					'before' => '<label for="ProfileAgree">',
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
				    array('class' => 'btn btn-default')
				); 
				?>
			</div>
			<div class="col-lg-6">
				<?php
				$options = array(
					'label' => __('登記成為導師'),
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