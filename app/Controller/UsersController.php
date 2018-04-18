<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());	
	}

	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());

        //$title_for_layout = 'Dashbord';
        //$this->set(compact('title_for_layout'));
    }	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}	



/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->Session->read('Auth.User')) {
	        $this->Session->setFlash(__('You have already registered!'), 'alert_box', array('class' => 'alert-warning'));
	        return $this->redirect(array('controller' => 'posts', 'action' => 'home'));
	    }
	    if (isset($this->params['named']['ref'])) {
	    	$this->set('from', $this->params['named']['ref']);
	    }
		if ($this->request->is('post')) {
			$this->request->data['User']['group_id'] = '3';
			if ($this->request->data['User']['role'] == 'Hire') {
				$this->request->data['User']['is_student'] = true;
				$this->request->data['User']['default_role'] = 'student';
			} elseif ($this->request->data['User']['role'] == 'Teach') {
				$this->request->data['User']['is_tutor'] = true;
				$this->request->data['User']['default_role'] = 'tutor';
			}
			$this->User->create();
			if ($this->User->save($this->request->data) && $this->Auth->login()) {
				if ($this->request->data['User']['role'] == 'Hire') {
					$this->Session->setFlash(__('The user has been saved.'), 'alert_box', array('class' => 'alert-success'));
					return $this->redirect(array('controller' => 'posts', 'action' => 'msf_setup'));
				} elseif ($this->request->data['User']['role'] == 'Teach') {
					$this->Session->setFlash(__('The user has been saved.'), 'alert_box', array('class' => 'alert-success'));
					return $this->redirect(array('controller' => 'profiles', 'action' => 'msf_setup'));					
				}
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		}
		$groups = $this->User->Group->find('list', array('order' => array('Group.id' => 'asc')));
		$this->set(compact('groups'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list', array('order' => array('Group.id' => 'asc')));
		$this->set(compact('groups'));
	}	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->User->id = $this->Auth->user('id');
		$this->User->set($this->request->data);
		if ($this->request->is(array('post', 'put'))) {
			if($this->User->validates()) {
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved.'), 'alert_box', array('class' => 'alert-success'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
				}
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again!'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list', array('order' => array('Group.id' => 'asc')));
		$this->set(compact('groups'));
	}

	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list', array('order' => array('Group.id' => 'asc')));
		$this->set(compact('groups'));
	}	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'), 'alert_box', array('class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}	

	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}		

	public function login() {
		if ($this->Session->read('Auth.User')) {
	        $this->Session->setFlash(__('You are already logged in!'), 'alert_box', array('class' => 'alert-warning'));
	        return $this->redirect($this->referer());
	    }
	    if (isset($this->params['named']['ref'])) {
	    	$this->set('from', $this->params['named']['ref']);
	    }
	    if ($this->request->is('post')) { 
	    	if ($this->Auth->login()) {
	        	$this->Session->setFlash(__('You are logged in!'), 'alert_box', array('class' => 'alert-success'));
	        	if (isset($this->request->data['role']) && $this->request->data['role'] == 'post') {
	        		return $this->redirect(array('controller' => 'posts', 'action' => 'msf_setup'));
	        	} elseif (isset($this->request->data['role']) && $this->request->data['role'] == 'profile') {
	        		return $this->redirect(array('controller' => 'profiles', 'action' => 'msf_setup'));
	        	} elseif ($this->Session->read('lastUrl')) {
            		return $this->redirect($this->Session->read('lastUrl'));
        		} else {
            		return $this->redirect($this->Auth->redirect());
        		}
            }
        	$this->Session->setFlash(__('Your username or password was incorrect.'), 'alert_box', array('class' => 'alert-danger'));
	    }
	}

	public function admin_login() {
		if ($this->Session->read('Auth.User')) {
	        $this->Session->setFlash(__('You are already logged in!'));
	        return $this->redirect($this->referer());
	    }
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	        	$this->Session->setFlash(__('You are logged in!'));
        		if ($this->Session->read('lastUrl')) {
            		return $this->redirect($this->Session->read('lastUrl'));
        		} else {
            		return $this->redirect($this->Auth->redirect());
        		}
	        }
	        $this->Session->setFlash(__('Your username or password was incorrect.'));
	    }
	}	

	public function logout() {
	    $this->Session->delete('form');
	    $this->Session->delete('role');
    	$this->Session->setFlash(__('Good-Bye'), 'alert_box', array('class' => 'alert-success'));
		$this->redirect($this->Auth->logout());
	}

    public function beforeRender(){
    	parent::beforeRender();

        $params = $this->Session->read('form.params');
        $this->set('params', $params);    	

		if (AuthComponent::user('group_id') == '3') {
			$sidebar = 'tutor_sidebar';
		}
		if (AuthComponent::user('group_id') == '4') {
			$sidebar = 'student_sidebar';
		}
		if (isset($sidebar)) {
			$this->set('sidebar', $sidebar);
		}
	}

	public function change_password() {
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		}		
	    //if (!empty($this->data)) {
	    //    if ($this->User->save($this->data)) {
	    //        $this->Session->setFlash('Password has been changed.');
	    //        // call $this->redirect() here
	    //    } else {
	    //        $this->Session->setFlash('Password could not be changed.');
	    //    }
	    //} else {
	    //    $this->data = $this->User->findById($this->Auth->user('id'));
	    //}
	}	

	public function beforeFilter() {
		parent::beforeFilter();
	
	    // For CakePHP 2.1 and up
	    //$this->Auth->allow('initDB');
	    $this->Auth->allow('index', 'view', 'add', 'login');
	}
	
//	public function initDB() {
//	    $group = $this->User->Group;
//	
//	    // Allow admins to everything
//	    $group->id = 1;
//	    $this->Acl->allow($group, 'controllers');
//	
//	    // allow managers to posts and widgets
//	    $group->id = 2;
//	    $this->Acl->deny($group, 'controllers');
//    	$this->Acl->deny($group, 'controllers/Posts/admin_add');
//    	$this->Acl->deny($group, 'controllers/Posts/admin_edit');
//    	$this->Acl->deny($group, 'controllers/Posts/admin_index');
//    	$this->Acl->deny($group, 'controllers/Posts/admin_view');
//	    $this->Acl->allow($group, 'controllers/Posts');
//	    $this->Acl->allow($group, 'controllers/Widgets');
//
//		//allow managers to log out
//	    $this->Acl->allow($group, 'controllers/users/logout');
//	    $this->Acl->allow($group, 'controllers/users/change_password');
//	
//	    // allow users to only add and edit on posts and widgets
//	    $group->id = 3;
//	    $this->Acl->deny($group, 'controllers');
//	    $this->Acl->allow($group, 'controllers/Posts/msf_setup');
//	    $this->Acl->allow($group, 'controllers/Posts/msf_step_1');
//	    $this->Acl->allow($group, 'controllers/Posts/msf_step_2');
//	    $this->Acl->allow($group, 'controllers/Posts/student');	    
//	    $this->Acl->allow($group, 'controllers/Profiles/msf_setup');
//	    $this->Acl->allow($group, 'controllers/Profiles/msf_step_1');
//	    $this->Acl->allow($group, 'controllers/Profiles/msf_step_2');
//	    $this->Acl->allow($group, 'controllers/Orders/preview');
//	    $this->Acl->allow($group, 'controllers/Orders/view');
//
//		//allow basic users to log out
//	    $this->Acl->allow($group, 'controllers/users/logout');
//	    $this->Acl->allow($group, 'controllers/users/change_password');
//	
//	    // we add an exit to avoid an ugly "missing views" error message
//	    echo "all done";
//	    exit;
//	}
//./Console/cake AclExtras.AclExtras aco_sync

}
