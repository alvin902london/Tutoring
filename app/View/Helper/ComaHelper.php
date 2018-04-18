<?php
App::uses('AppHelper', 'View/Helper');

class ComaHelper extends AppHelper {
	public $helpers = array('Time');

	public function coma($array, $name, $postOwner = null) {
   		$prefix = ''; 
   		$result = '';
   		$i = 1;
   		foreach ($array as $key => $value) { 
			if ($name == 'index') { 
				$theName = $value['name']; 
			} elseif ($name == 'preview') { 
				$theName = $value; 
			} elseif ($name == 'condition') {
				$theName = $i . __('）') . $value['week'] . ' <span class="text-border text-border-green tooltips" data-toggle="tooltip" data-original-title="' . __('最早開始時間') . '">' . $this->Time->format('h:i A', $value['start']) . '</span> ' . __('至') . ' <span class="text-border text-border-green tooltips" data-toggle="tooltip" data-original-title="' . __('最遲結束時間') . '">' . $this->Time->format('h:i A', $value['end']) . '</span>';
			} elseif ($name == 'extra') {
				$theName = $i . __('）') . $value['name'];
			}

			$result .= $prefix . $theName;
			$i++;

			if ($name == 'condition' || $name == 'extra') { 
				$prefix = '<br>'; 
			} else { 
				$prefix = ', '; 
			}
   		}
   		if (($name == 'condition' || $name == 'extra') && $i > 2 && $this->params['action'] !== 'preview') {
   			$result = '<br>' . $result;
   		} elseif (($name == 'condition' || $name == 'extra') && $i == 2 && $postOwner !== true) {
   			$result = str_replace('1）', '', $result);
   		} elseif (($name == 'condition' || $name == 'extra') && $i == 2 && $postOwner == true) {
			$result = str_replace('1）', '', $result);
			$result = '<br>' . $result;
   		}	

   		return $result;

    } 
}