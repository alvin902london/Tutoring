<ul class="nav nav-pills" role="tablist">
	<li role="presentation" class="<?php echo (($this->params['controller']==='users') && ($this->params['action']=='view'))?'active' :'' ?>"><a href="<?php echo $this->webroot; ?>users/view/<?php echo AuthComponent::user('id'); ?>">Account Information <span class="badge"></span></a></li>
	<li role="presentation" class="<?php echo (($this->params['controller']==='users') && ($this->params['action']=='edit'))?'active' :'' ?>"><a href="<?php echo $this->webroot; ?>users/edit/<?php echo AuthComponent::user('id'); ?>">Change Password <span class="badge"></span></a></li>
	<?php if (isset($sidebar)) { echo $this->element($sidebar); } ?>
</ul>