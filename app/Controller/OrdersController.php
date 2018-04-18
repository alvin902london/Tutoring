<?php
App::uses('BetweenController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends BetweenController {

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
		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
	}	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}





	//Preview bedore placing order
	public function preview($post_id = null, $comment_id = null) {
		if (!$this->Order->Post->exists($post_id) or !$this->Order->Comment->exists($comment_id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		//Get Chosen Comment
		$options = array('conditions' => array('Comment.' . $this->Order->Comment->primaryKey => $comment_id));
		$comment = $this->Order->Comment->find('first', $options);
		$this->set('comment', $comment);

		//Get Post
		$options = array('conditions' => array('Post.' . $this->Order->Post->primaryKey => $post_id));
		$post = $this->Order->Post->find('first', $options);
		$this->set('post', $post);

		//Get Tutor's Profile
		$options = array('conditions' => array('Profile.user_id' => $comment['Comment']['user_id']));
		$profile = $this->Order->Comment->User->Profile->find('first', $options);
		$this->set('profile', $profile['Profile']);

		if ($this->request->is('post')) {	
			//Create Order		
			$this->Order->create();

			//Save which user the post belongs to
			$this->request->data['Order']['post_id'] = $post_id;
			$this->request->data['Order']['comment_id'] = $comment_id;
			$stack = array();
			array_push($stack, $post['Post']['user_id']);
			array_push($stack, $comment['Comment']['user_id']);

			$this->request->data['User'] = array('User' => $stack);

			//Set Post to 'Ordered'
			$this->request->data['Post']['is_ordered'] = 1;
			$this->Order->Post->id = $post_id;

			//Set Comment to 'Locked'
			$this->request->data['Comment']['is_locked'] = 1;
			$this->Order->Comment->id = $comment_id;

			if ($this->Order->save($this->request->data) && $this->Order->Post->save($this->request->data['Post']) && $this->Order->Comment->save($this->request->data['Comment'])) {
				$this->Session->setFlash(__('The order has been placed.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'view', $this->Order->getLastInsertId()));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$this->request->data['Order']['email'] = AuthComponent::User('username');		
			$this->request->data['Order']['contact_person'] = AuthComponent::User('contact_person');	
		}
	}	

/**
 * add method
 *
 * @return void
 */
	public function add($student_id = null, $tutor_id = null) {

		//Get Student
		$options = array('conditions' => array('User.' . $this->Order->User->primaryKey => $student_id));
		$this->set('student', $this->Order->User->find('first', $options));			

		//Get Tutor
		$options = array('conditions' => array('User.' . $this->Order->User->primaryKey => $tutor_id));
		$this->set('tutor', $this->Order->User->find('first', $options));	

		//Get Tutor's Profile
		$options = array('conditions' => array('Profile.user_id' => $tutor_id));
		$profile = $this->Order->User->Profile->find('first', $options);
		$this->set('profile', $profile['Profile']);

		$data = array(
		    //'stepNumber' => $stepNumber,
		    'select_districts' => $this->select_districts,
		    'select_subjects' => $this->select_subjects,
		    'select_frequency' => $this->select_frequency,
		    'select_duration' => $this->select_duration,
		    'select_condition' => $this->select_condition,
		    'select_first_condition' => $this->select_first_condition,
		    'select_rate' => $this->select_rate,
		    'select_tutor_type' => $this->select_tutor_type,
		    'select_gender' => $this->select_gender,
		    'select_grade' => $this->select_grade,
		    //'select_year' => $this->select_year,	    		    
		    'select_number' => $this->select_number
		);
		$this->set($data);		

		if ($this->request->is('post')) {
			
			//Create Order		
			$this->Order->create();

			//Save which user the post belongs to

			//$this->request->data['Order']['student_id'] = $student_id;
			//$this->request->data['Order']['tutor_id'] = $tutor_id;
			$stack = array();
			array_push($stack, $student_id);
			array_push($stack, $tutor_id);

			$this->request->data['User'] = array('User' => $stack);

			$this->request->data['Order']['student_id'] = $student_id;
			$this->request->data['Order']['tutor_id'] = $tutor_id;

			////Set Post to 'Ordered'
			//$this->request->data['Post']['is_ordered'] = 1;
			//$this->Order->Post->id = $post_id;

			////Set Comment to 'Locked'
			//$this->request->data['Comment']['is_locked'] = 1;
			//$this->Order->Comment->id = $comment_id;

			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been placed.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'view', $this->Order->getLastInsertId()));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$this->request->data['Order']['email'] = AuthComponent::User('username');		
			$this->request->data['Order']['contact_person'] = AuthComponent::User('contact_person');	
		}		

		////Default Create Order
		//if ($this->request->is('post')) {
		//	$this->Order->create();
		//	if ($this->Order->save($this->request->data)) {
		//		$this->Session->setFlash(__('The order has been saved.'), 'alert_box', array('class' => 'alert-success'));
		//		return $this->redirect(array('action' => 'index'));
		//	} else {
		//		$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
		//	}
		//}
		//$posts = $this->Order->Post->find('list');
		//$comments = $this->Order->Comment->find('list');
		//$users = $this->Order->User->find('list');
		//$this->set(compact('posts', 'comments', 'users'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$posts = $this->Order->Post->find('list');
		$comments = $this->Order->Comment->find('list');
		$users = $this->Order->User->find('list');
		$this->set(compact('posts', 'comments', 'users'));
	}	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		} 

		$confirmed = $this->Order->findById($id);
		if ($confirmed['Order']['is_confirmed'] == '1') {
			return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
		}

		if ($this->request->is(array('post', 'put'))) {

			if(isset($this->request->data['btn'])) {
				$this->request->data['Order']['status'] = 1;
				$this->request->data['Post']['is_ordered'] = 1;
			} else {
				$this->request->data['Order']['status'] = 0;
				$this->request->data['Post']['is_ordered'] = 0;
			}
			$this->request->data['Order']['id'] = $id;
			$this->request->data['Order']['is_confirmed'] = 1;

			$this->Order->Post->id = $confirmed['Order']['post_id'];

			if ($this->Order->save($this->request->data) && $this->Order->Post->save($this->request->data['Post'])) {
				$this->Session->setFlash(__('The order has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$posts = $this->Order->Post->find('list');
		$comments = $this->Order->Comment->find('list');
		$users = $this->Order->User->find('list');
		$this->set(compact('posts', 'comments', 'users'));
	}

	public function admin_edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$posts = $this->Order->Post->find('list');
		$comments = $this->Order->Comment->find('list');
		$users = $this->Order->User->find('list');
		$this->set(compact('posts', 'comments', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');

		$this->request->data['Post']['is_ordered'] = false;

		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$order = $this->Order->find('first', $options);

		$this->Order->Post->id = $order['Order']['post_id'];

		if ($this->Order->delete() && $this->Order->Post->save($this->request->data['Post'])) {
			$this->Session->setFlash(__('The order has been deleted.'), 'alert_box', array('class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('The order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	
}
