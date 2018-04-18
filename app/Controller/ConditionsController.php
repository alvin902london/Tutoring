<?php
App::uses('AppController', 'Controller');
/**
 * Conditions Controller
 *
 * @property Condition $Condition
 * @property PaginatorComponent $Paginator
 */
class ConditionsController extends AppController {

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
		$this->Condition->recursive = 0;
		$this->set('conditions', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->Condition->recursive = 0;
		$this->set('conditions', $this->Paginator->paginate());
	}	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Condition->exists($id)) {
			throw new NotFoundException(__('Invalid condition'));
		}
		$options = array('conditions' => array('Condition.' . $this->Condition->primaryKey => $id));
		$this->set('condition', $this->Condition->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->Condition->exists($id)) {
			throw new NotFoundException(__('Invalid condition'));
		}
		$options = array('conditions' => array('Condition.' . $this->Condition->primaryKey => $id));
		$this->set('condition', $this->Condition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Condition->create();
			if ($this->Condition->save($this->request->data)) {
				$this->Session->setFlash(__('The condition has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The condition could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		}
		$posts = $this->Condition->Post->find('list');
		$this->set(compact('posts'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Condition->create();
			if ($this->Condition->save($this->request->data)) {
				$this->Session->setFlash(__('The condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The condition could not be saved. Please, try again.'));
			}
		}
		$posts = $this->Condition->Post->find('list');
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
		if (!$this->Condition->exists($id)) {
			throw new NotFoundException(__('Invalid condition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Condition->save($this->request->data)) {
				$this->Session->setFlash(__('The condition has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The condition could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Condition.' . $this->Condition->primaryKey => $id));
			$this->request->data = $this->Condition->find('first', $options);
		}
		$posts = $this->Condition->Post->find('list');
		$this->set(compact('posts'));
	}

	public function admin_edit($id = null) {
		if (!$this->Condition->exists($id)) {
			throw new NotFoundException(__('Invalid condition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Condition->save($this->request->data)) {
				$this->Session->setFlash(__('The condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The condition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Condition.' . $this->Condition->primaryKey => $id));
			$this->request->data = $this->Condition->find('first', $options);
		}
		$posts = $this->Condition->Post->find('list');
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
		$this->Condition->id = $id;
		if (!$this->Condition->exists()) {
			throw new NotFoundException(__('Invalid condition'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Condition->delete()) {
			$this->Session->setFlash(__('The condition has been deleted.'), 'alert_box', array('class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('The condition could not be deleted. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		$this->Condition->id = $id;
		if (!$this->Condition->exists()) {
			throw new NotFoundException(__('Invalid condition'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Condition->delete()) {
			$this->Session->setFlash(__('The condition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The condition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	
}
