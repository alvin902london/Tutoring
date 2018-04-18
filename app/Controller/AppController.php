<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
		'Acl',
		'Auth' => array(
			'authorize' => array(
				'Actions' => array('actionPath' => 'controllers')
			),
			'unauthorizedRedirect' => '/posts'
		),
		'Session'
		//'Cookie'
	);
	public $helpers = array('Html', 'Form' => array('className' => 'BootstrapForm'), 'Session', 'Coma', 'Time', 'String');
//=> array('className' => 'BootstrapForm')
	//public $uses = array('User');	

	public function beforeFilter() {
		//Configure AuthComponent
		$this->Auth->loginAction = array(
			'controller' => 'users',
			'action' => 'login'
		);
		$this->Auth->logoutRedirect = array(
			'controller' => 'users',
			'action' => 'login'
		);
		$this->Auth->loginRedirect = array(
			'controller' => 'posts',
		 	'action' => 'index'
		);
		$this->Auth->allow('display', 'switch_role');

		if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))) {
			$this->layout = 'admin';
		}

		$url = Router::url(NULL, true); //Complete URL
    	if (!preg_match('/login|logout/i', $url)) {
    	    $this->Session->write('lastUrl', $url);
    	} 

	//	//Set Cookie Options
	//    //$this->Cookie->key = 'qSI232qs*&sXOw!adre@34SAv!@*(XSL#$%)asGb$@11~_+!@#HKis~#^';
	//    $this->Cookie->httpOnly = true;
	//
	//    if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me_cookie')) {
	//        $cookie = $this->Cookie->read('remember_me_cookie');
	//		$this->loadModel('User');
	//        $user = $this->User->find('first', array(
	//            'conditions' => array(
	//                'User.username' => $cookie
	//                //'User.password' => $cookie['password']
	//            )
	//        ));	
	//        if ($user && !$this->Auth->login($user['User']['username'])) {
	//            $this->redirect('/users/logout'); //Destroy Session & Cookie
	//        }
	//    } 	
	}

	public function beforeRender() {
		$this->set('userData', $this->Auth->user());

		if (isset($this->request->params['pass']['0'])){
			$parameter = $this->request->params['pass']['0'];
		} else {
			$parameter = null;
		}
		$this->set('parameter', $parameter);
	}

	public function switch_role($role, $action) {
		if ($this->request->is('post')) {
			if (($role == 'student' && AuthComponent::user('is_student') == true) || ($role == 'tutor' && AuthComponent::user('is_tutor') == true)) {
				$this->Session->delete('role');
				$this->Session->write('role', $role);
				return $this->redirect(array('action' => $action));
			}

			if ($role == 'student') {
				$role_name = __('student');
			} elseif ($role == 'tutor'){
				$role_name = __('tutor');
			}
			$this->Session->setFlash(__('You need to first register as a ') . $role_name, 'alert_box', array('class' => 'alert-warning'));
			return $this->redirect(array('action' => $action));
		}
	}
}
