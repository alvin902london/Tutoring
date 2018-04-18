<?php
App::uses('BetweenController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends BetweenController {

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
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}	

/**
 * add method
 *
 * @return void
 */
	public function add($post_id = null) {
		if (is_null($post_id)) {
			throw new NotFoundException(__('Post does not exist'));
		} elseif (!$this->Comment->Post->exists($post_id)) {
			throw new NotFoundException(__('Post does not exist'));
		}

		//Check whether or not to display layout for the post owner
		if ($this->Comment->Post->isOwnedby($post_id)) {
			$postOwner = true;
		} else {
			$postOwner = false;
		}
		$this->set('postOwner', $postOwner); 	

		//Check if a user tried to assess a page that is closed manuelly
		$confirmed = $this->Comment->Post->findById($post_id);
		if ($confirmed['Post']['is_ordered'] == '1') {
			return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
		}

		//Map
		$coordinates = $this->Comment->getCoordinates($confirmed['Post']['estate'] . ', Hong Kong');
		$this->set('coordinates', $coordinates);

		//Get Post
		$options = array('conditions' => array('Post.' . $this->Comment->Post->primaryKey => $post_id));
		$this->set('post', $this->Comment->Post->find('first', $options));

//		//Check whether or not to display edit option
//		if ($this->Comment->isOwnedby($post_id)) {
//			$commentOwner = true;
//		} else {
//			$commentOwner = false;
//		}
//		$this->set('commentOwner', $commentOwner);
		
		//Get Comments
		$this->Comment->recursive = 0;
		$options = array(
			'conditions' => array('Comment.post_id' => $post_id, 'Comment.is_locked' => 0),
			'limit' => 4,
		);
		$this->Paginator->settings = $options;
		$this->set('comments', $this->Paginator->paginate());

		//$users = $this->Comment->User->find('list');
		//$posts = $this->Comment->Post->find('list');
		//$this->set(compact('users', 'posts'));

		//Check, if a user is logged in and is a tutor, whether gender and type match
		if (AuthComponent::user('id') && AuthComponent::user('is_tutor') == true) {
			$options = array('conditions' => array('Profile.user_id' => AuthComponent::user('id')));
			$profile = $this->Comment->User->Profile->find('first', $options);
			if ($profile['Profile']['gender'] == $confirmed['Post']['tutor_gender']) {
				$gender = true;
			} else {
				$gender = false;
			}
			if ($profile['Profile']['tutor_type'] == '現職教師／全職補習導師' && $confirmed['Post']['tutor_type'] == '現職教師' || $confirmed['Post']['tutor_type'] == '全職補習導師') {
				$type = true;
			} elseif ($profile['Profile']['tutor_type'] == '大學程度／大學畢業' && $confirmed['Post']['tutor_type'] == '大學程度' || $confirmed['Post']['tutor_type'] == '大學畢業') {
				$type = true;
			} elseif ($profile['Profile']['tutor_type'] == '應屆DSE考生' && $confirmed['Post']['tutor_type'] == '應屆DSE考生') {
				$type = true;
			} elseif ($profile['Profile']['tutor_type'] == '外籍導師' && $confirmed['Post']['tutor_type'] == '外籍導師') {
				$type = true;
			} else {
				$type = false;
			}
			$data = array(
				'gender' => $gender,
				'type' => $type,
				'progile' => $profile
			);
			$this->set($data);
		}
		//Reply cannot propose time that is more than the original
		array_splice($this->select_frequency, $confirmed['Post']['frequency'], 7 - $confirmed['Post']['frequency']);
		if ($confirmed['Post']['duration'] == '1') {
			$deduction = '1';
		} elseif ($confirmed['Post']['duration'] == '1.5') {
			$deduction = '2';
		} elseif ($confirmed['Post']['duration'] == '2') {
			$deduction = '3';
		} elseif ($confirmed['Post']['duration'] == '2.5') {
			$deduction = '4';
		} elseif ($confirmed['Post']['duration'] == '3') {	
			$deduction = '5';
		}	
		array_splice($this->select_duration, $deduction, 5 - $deduction);

		$data = array(
		    //'stepNumber' => $stepNumber,
		    //'select_districts' => $this->select_districts,
		    //'select_subjects' => $this->select_subjects,
		    'select_frequency' => $this->select_frequency,
		    'select_duration' => $this->select_duration,
		    //'select_condition' => $this->select_condition,
		    //'select_first_condition' => $this->select_first_condition,
		    'select_rate' => $this->select_rate,
		    //'select_tutor_type' => $this->select_tutor_type,
		    //'select_gender' => $this->select_gender,
		    //'select_grade' => $this->select_grade,
		    //'select_year' => $this->select_year,	    		    
		    //'select_number' => $this->select_number
		);
		$this->set($data);	

		if ($this->request->is('post')) {
			if ($this->Auth->login() || AuthComponent::user()) {
				if (AuthComponent::user('is_tutor') == '1') {
					$userId = $this->Comment->User->Profile->find('first', array(
						'conditions' => array(
							'Profile.User_id' => AuthComponent::user('id')
						)
					));
				} else {
					$this->Session->setFlash(__('You need to register as a tutor to reply'), 'alert_box', array('class' => 'alert-danger'));
					if ($this->Session->read('lastUrl')) {
            			return $this->redirect($this->Session->read('lastUrl'));
        			} else {
            			return $this->redirect(array('controller' => 'comments', 'action' => 'add', $post_id));
        			}
				}
				unset($this->request->data['User']);
	
				$this->Comment->create();
				$this->request->data['Comment']['post_id'] = $post_id;
				$this->request->data['Comment']['user_id'] = AuthComponent::user('id');
				$this->request->data['Comment']['tutor_type'] = $userId['Profile']['tutor_type'];
				$this->request->data['Comment']['tutor_gender'] = $userId['Profile']['gender'];
				if ($this->Comment->save($this->request->data)) {

					//$Email = new CakeEmail();
					//$Email->config('tutor');
					//$Email->from(array('me@example.com' => 'My Site'));
					//$Email->to('postmaster@go4tutor.hk');
					//$Email->viewVars(array('name' => 'Alvin'));
					//$Email->subject('About');
					//$Email->template('registration');
					//$Email->emailFormat('both');
					//$Email->send('My message');
		
					$this->Session->setFlash(__('The comment has been saved.'), 'alert_box', array('class' => 'alert-success'));
		
					if ($this->Session->read('lastUrl')) {
            			return $this->redirect($this->Session->read('lastUrl'));
        			} else {
            			return $this->redirect($this->Auth->redirect());
        			}
				} else {
					$this->Session->setFlash(__('The comment could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
				}
			} else {
				$this->Session->setFlash(__('Your username or password was incorrect.'), 'alert_box', array('class' => 'alert-danger'));
			}
		}			
	}

	public function admin_add($post_id = null) {
		if ($this->request->is('post')) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
        		if ($this->Session->read('lastUrl')) {
            		return $this->redirect($this->Session->read('lastUrl'));
        		} else {
            		return $this->redirect($this->Auth->redirect());
        		}
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
		$users = $this->Comment->User->find('list');
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('users', 'posts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}

		if (isset($id)) {
			if (!$this->Comment->Post->isOwnedby($id)) {
				$this->Session->setFlash(__('No, you cannot edit comments that aren\'t owned by you.'), 'alert_box', array('class' => 'alert-danger'));
				$this->redirect($this->referer());
			}	
		}	

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$users = $this->Comment->User->find('list');
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('users', 'posts'));
	}

	public function admin_edit($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$users = $this->Comment->User->find('list');
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('users', 'posts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('The comment has been deleted.'), 'alert_box', array('class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('The comment could not be deleted. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('The comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}	

}
