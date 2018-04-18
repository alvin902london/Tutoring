<?php
App::uses('AppHelper', 'View/Helper');

class StringHelper extends AppHelper {
	public $helpers = array('Time');

	public function checkStartDate($created, $first, $field) {
		$createdDate = strtotime($created);
		$firstDate = strtotime($first);
		$nextDate = strtotime('+1 day', time());
		if (($firstDate > $createdDate) && ($firstDate > $nextDate)) {
			$str = $this->Time->format('Y年m月j日', $first);
			if ($field == 'FirstCondition') {
				$startDate = $str . __('後首個');
			} elseif ($field == 'first') {
				$startDate = $str . __('後首個星期開始') ;
			}
		} else {
			if ($field == 'FirstCondition') {
				$startDate = __('個案確認後首個');
			} elseif ($field == 'first') {
				$startDate = __('個案確認後首個星期開始');
			}
		}
		return $startDate;
	}
}