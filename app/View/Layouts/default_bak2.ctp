<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->Html->charset(); ?>
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>
			<?php echo $cakeDescription ?>:
			<?php echo $this->fetch('title'); ?>
		</title>

		<?php
			echo $this->Html->meta('icon');
			//Bootstrap core CSS
			//Custom styles for this template
			echo $this->Html->css(array('bootstrap', 'bootstrap-datetimepicker', 'bootstrap-datetimepicker.min', 'sticky_footer'));
			echo $this->Html->script(array('jquery-1.11.3.min', 'moment', 'bootstrap-datetimepicker.min', 'bootstrap-checkbox'));
	
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>			
	</head>

	<body>
		<!-- Begin page content -->
		<nav class="navbar navbar-default">
			<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo $this->webroot; ?>">After School</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hire <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Separated link</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">One more separated link</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teach <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Separated link</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">One more separated link</a></li>
									</ul>
								</li>								
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">How it works <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Separated link</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">One more separated link</a></li>
									</ul>
								</li>
						</ul>
				<?php echo $this->Html->link(__('Find'), array('controller' => 'posts', 'action' => 'msf_setup'), array('class' => 'btn btn-default navbar-btn')); ?>
				<?php echo $this->Html->link(__('Pick'), array('controller' => 'posts', 'action' => 'msf_setup'), array('class' => 'btn btn-default navbar-btn')); ?>		
						<?php if(!$this->Session->read('Auth.User')): ?> 
							<form class="navbar-form navbar-right" role="search">
								<div class="btn-group" role="group" aria-label="...">
								<?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-default')); ?>
								<?php echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-default')); ?>
								</div>
							</form>
						<?php endif; ?>
						<?php if(AuthComponent::user('id')): ?>
							<form class="navbar-form navbar-right" role="search">
								<div class="btn-group" role="group" aria-label="...">
									<div class="btn-group" role="group">
										<?php if(AuthComponent::user('group_id') == '1') { 
											echo $this->Html->link(__('Admin Dashboard'), 
												array('admin' => true, $parameter), 
												array('class' => 'btn btn-default')); 
										} ?>
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo __('My Account'); ?>
											<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
											<li><?php echo $this->Html->link(__('My Account'), array('controller' => 'users')); ?></li>
											<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
									</ul>
							</div>													
						</div>
					</form>
					<p class="navbar-text navbar-right">Welcome, <?php echo $userData['contact_person']; ?></p>
						<?php endif; ?>
					</div><!-- /.navbar-collapse -->
			</div>
		</nav>

		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer class="footer">
			<div class="container">
				<p class="text-muted">Place sticky footer content here.</p>
			</div>
		</footer>
				<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->	
		<script src="<?php echo $this->webroot; ?>js/bootstrap.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="<?php echo $this->webroot; ?>js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>