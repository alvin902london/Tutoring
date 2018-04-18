<?php
App::uses('AppController', 'Controller');
/**
 * Subjects Controller
 *
 * @property Subject $Subject
 * @property PaginatorComponent $Paginator
 */
class SubjectsController extends AppController {

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
		$this->Subject->recursive = 0;
		$this->set('subjects', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->Subject->recursive = 0;
		$this->set('subjects', $this->Paginator->paginate());
	}	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
		$this->set('subject', $this->Subject->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
		$this->set('subject', $this->Subject->find('first', $options));
	}	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subject->create();
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('The subject has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		}
		$posts = $this->Subject->Post->find('list');
		$this->set(compact('posts'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Subject->create();
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('The subject has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.'));
			}
		}
		$posts = $this->Subject->Post->find('list');
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
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('The subject has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
			$this->request->data = $this->Subject->find('first', $options);
		}
		$posts = $this->Subject->Post->find('list');
		$this->set(compact('posts'));
	}

	public function admin_edit($id = null) {
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('The subject has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
			$this->request->data = $this->Subject->find('first', $options);
		}
		$posts = $this->Subject->Post->find('list');
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
		$this->Subject->id = $id;
		if (!$this->Subject->exists()) {
			throw new NotFoundException(__('Invalid subject'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Subject->delete()) {
			$this->Session->setFlash(__('The subject has been deleted.'), 'alert_box', array('class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('The subject could not be deleted. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		$this->Subject->id = $id;
		if (!$this->Subject->exists()) {
			throw new NotFoundException(__('Invalid subject'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Subject->delete()) {
			$this->Session->setFlash(__('The subject has been deleted.'));
		} else {
			$this->Session->setFlash(__('The subject could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	
}
