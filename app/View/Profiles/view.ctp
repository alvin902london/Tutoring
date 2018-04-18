<div class="container">
<h2><?php echo __('Profile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($profile['User']['id'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Full Name En'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['full_name_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Full Name Chi'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['full_name_chi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth Year'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['birth_year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identity'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['identity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['district']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estate'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['estate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tutor Type'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['tutor_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Education'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['education']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Experience'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['experience']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $profile['Profile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profile'), array('action' => 'delete', $profile['Profile']['id']), array(), __('Are you sure you want to delete # %s?', $profile['Profile']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li>
			<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'add', AuthComponent::user('id'), $profile['Profile']['user_id'])); ?>
 		</li>
	</ul>
</div>
