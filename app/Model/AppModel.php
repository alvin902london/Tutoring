<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	public $actsAs = array('Containable');
	
	public function isOwnedBy($id) {
		$post = $this->findById($id);
		if($post['Post']['user_id'] == AuthComponent::user('id')) {
			return true;
		}
	}	

	public function checkRange() {
		if ($this->Post->data['Post']['duration'] == '1') {
			$duration = 1;
		} elseif ($this->Post->data['Post']['duration'] == '1.5') {
			$duration = 1.5;
		} elseif ($this->Post->data['Post']['duration'] == '2') {
			$duration = 2;
		} elseif ($this->Post->data['Post']['duration'] == '2.5') {
			$duration = 2.5;
		} elseif ($this->Post->data['Post']['duration'] == '3') {
			$duration = 3;
		}
		if (!empty($this->data['Condition'])) {
			$start = strtotime($this->data['Condition']['start']);
			$end = strtotime($this->data['Condition']['end']);
			if ((($end - $start) / 3600) < $duration) {
				return false;
			}
		} elseif (!empty($this->data['FirstCondition'])) {
			$start = strtotime($this->data['FirstCondition']['start']);
			$end = strtotime($this->data['FirstCondition']['end']);
			if ((($end - $start) / 3600) < $duration) {
				return false;
			}
		}
		return true;
	}

	public function checkFrequency($check) {
		if ($this->data['Comment']['frequency_not_ok'] == true) {
			if(empty($this->data['Comment']['frequency_remarks']) || empty($this->data['Comment']['duration_remarks'])) {
				return false;
			}
		}
		return true;
	}

	public function checkRate($check) {
		if ($this->data['Comment']['rate_not_ok'] == true) {
			if(empty($this->data['Comment']['rate_remarks'])) {
				return false;
			}
		}
		return true;
	}

	public function checkRateRemarks($check) {
		if (!isset($this->data['Comment']['rate_not_ok'])) {
			if(empty($this->data['Comment']['rate_remarks'])) {
				return false;
			}			
		}		
		return true;
	}		

	public function getCoordinates($address) {
		$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
		$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";	 
		$response = file_get_contents($url);	 
		$json = json_decode($response, TRUE); //generate array object from the response from the web
		
		$coordinates = array($json['results'][0]['geometry']['location']['lat'], $json['results'][0]['geometry']['location']['lng']);
		return $coordinates;
	}	
}
