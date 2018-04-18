<?php
App::uses('AppController', 'Controller');
/**
 * FirstConditions Controller
 *
 * @property FirstCondition $FirstCondition
 * @property PaginatorComponent $Paginator
 */
class FirstConditionsController extends AppController {

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
		$this->FirstCondition->recursive = 0;
		$this->set('firstConditions', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->FirstCondition->recursive = 0;
		$this->set('firstConditions', $this->Paginator->paginate());
	}	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FirstCondition->exists($id)) {
			throw new NotFoundException(__('Invalid first condition'));
		}
		$options = array('conditions' => array('FirstCondition.' . $this->FirstCondition->primaryKey => $id));
		$this->set('firstCondition', $this->FirstCondition->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->FirstCondition->exists($id)) {
			throw new NotFoundException(__('Invalid first condition'));
		}
		$options = array('conditions' => array('FirstCondition.' . $this->FirstCondition->primaryKey => $id));
		$this->set('firstCondition', $this->FirstCondition->find('first', $options));
	}	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FirstCondition->create();
			if ($this->FirstCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The first condition has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The first condition could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		}
		$posts = $this->FirstCondition->Post->find('list');
		$this->set(compact('posts'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FirstCondition->create();
			if ($this->FirstCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The first condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The first condition could not be saved. Please, try again.'));
			}
		}
		$posts = $this->FirstCondition->Post->find('list');
		$this->set(compact('posts'));
	}	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FirstCondition->exists($id)) {
			throw new NotFoundException(__('Invalid first condition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FirstCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The first condition has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The first condition could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('FirstCondition.' . $this->FirstCondition->primaryKey => $id));
			$this->request->data = $this->FirstCondition->find('first', $options);
		}
		$posts = $this->FirstCondition->Post->find('list');
		$this->set(compact('posts'));
	}

	public function admin_edit($id = null) {
		if (!$this->FirstCondition->exists($id)) {
			throw new NotFoundException(__('Invalid first condition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FirstCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The first condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The first condition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FirstCondition.' . $this->FirstCondition->primaryKey => $id));
			$this->request->data = $this->FirstCondition->find('first', $options);
		}
		$posts = $this->FirstCondition->Post->find('list');
		$this->set(compact('posts'));
	}	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FirstCondition->id = $id;
		if (!$this->FirstCondition->exists()) {
			throw new NotFoundException(__('Invalid first condition'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FirstCondition->delete()) {
			$this->Session->setFlash(__('The first condition has been deleted.'), 'alert_box', array('class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('The first condition could not be deleted. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		$this->FirstCondition->id = $id;
		if (!$this->FirstCondition->exists()) {
			throw new NotFoundException(__('Invalid first condition'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FirstCondition->delete()) {
			$this->Session->setFlash(__('The first condition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The first condition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	
}
