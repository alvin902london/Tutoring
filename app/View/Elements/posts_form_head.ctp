<?php 
if (isset($params['currentStep'])) {
	if($params['currentStep'] == '1') {
		$step1 = 'complete';
		$step2 = 'active';
		$step3 = 'disabled';
	} elseif($params['currentStep'] == '2') {
		$step1 = 'complete';
		$step2 = 'complete';
		$step3 = 'active';
	}
} else {
	$step1 = 'active';
	$step2 = 'disabled';
	$step3 = 'disabled';
}

if($this->params['controller'] == 'posts' || (isset($from) && $from == 'post')) {
	$step1_name = __('登入');
	$step2_name = __('填寫資料');
	$step3_name = __('預覧及登記');
} elseif ($this->params['controller'] == 'profiles' || (isset($from) && $from == 'profile')) {
	$step1_name = __('登入');
	$step2_name = __('填寫資料');
	$step3_name = __('預覧及登記');
}
?>
<div class="container">
<div class="row bs-wizard" style="border-bottom:0;">       
	<div class="col-lg-4 bs-wizard-step <?php echo $step1; ?>">
		<div class="text-center bs-wizard-stepnum"><?php echo $step1_name; ?></div>
		<div class="progress"><div class="progress-bar"></div></div>
		<p href="#" class="bs-wizard-dot"></p>
	</div>
	<div class="col-lg-4 bs-wizard-step <?php echo $step2; ?>"><!-- complete -->
		<div class="text-center bs-wizard-stepnum"><?php echo $step2_name; ?></div>
		<div class="progress"><div class="progress-bar"></div></div>
		<p href="#" class="bs-wizard-dot"></p>
	</div>
	<div class="col-lg-4 bs-wizard-step <?php echo $step3; ?>"><!-- complete -->
		<div class="text-center bs-wizard-stepnum"><?php echo $step3_name; ?></div>
		<div class="progress"><div class="progress-bar"></div></div>
		<p href="#" class="bs-wizard-dot"></p>
	</div>
</div>
</div>