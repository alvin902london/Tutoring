<?php
App::uses('AppController', 'Controller');
/**
 * ExtraRequirements Controller
 *
 * @property ExtraRequirement $ExtraRequirement
 * @property PaginatorComponent $Paginator
 */
class ExtraRequirementsController extends AppController {

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
		$this->ExtraRequirement->recursive = 0;
		$this->set('extraRequirements', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->ExtraRequirement->recursive = 0;
		$this->set('extraRequirements', $this->Paginator->paginate());
	}	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ExtraRequirement->exists($id)) {
			throw new NotFoundException(__('Invalid extra requirement'));
		}
		$options = array('conditions' => array('ExtraRequirement.' . $this->ExtraRequirement->primaryKey => $id));
		$this->set('extraRequirement', $this->ExtraRequirement->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExtraRequirement->create();
			if ($this->ExtraRequirement->save($this->request->data)) {
				$this->Session->setFlash(__('The extra requirement has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extra requirement could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		}
		$posts = $this->ExtraRequirement->Post->find('list');
		$this->set(compact('posts'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ExtraRequirement->create();
			if ($this->ExtraRequirement->save($this->request->data)) {
				$this->Session->setFlash(__('The extra requirement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extra requirement could not be saved. Please, try again.'));
			}
		}
		$posts = $this->ExtraRequirement->Post->find('list');
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
		if (!$this->ExtraRequirement->exists($id)) {
			throw new NotFoundException(__('Invalid extra requirement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ExtraRequirement->save($this->request->data)) {
				$this->Session->setFlash(__('The extra requirement has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extra requirement could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ExtraRequirement.' . $this->ExtraRequirement->primaryKey => $id));
			$this->request->data = $this->ExtraRequirement->find('first', $options);
		}
		$posts = $this->ExtraRequirement->Post->find('list');
		$this->set(compact('posts'));
	}

	public function admin_edit($id = null) {
		if (!$this->ExtraRequirement->exists($id)) {
			throw new NotFoundException(__('Invalid extra requirement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ExtraRequirement->save($this->request->data)) {
				$this->Session->setFlash(__('The extra requirement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extra requirement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ExtraRequirement.' . $this->ExtraRequirement->primaryKey => $id));
			$this->request->data = $this->ExtraRequirement->find('first', $options);
		}
		$posts = $this->ExtraRequirement->Post->find('list');
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
		$this->ExtraRequirement->id = $id;
		if (!$this->ExtraRequirement->exists()) {
			throw new NotFoundException(__('Invalid extra requirement'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ExtraRequirement->delete()) {
			$this->Session->setFlash(__('The extra requirement has been deleted.'), 'alert_box', array('class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('The extra requirement could not be deleted. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		$this->ExtraRequirement->id = $id;
		if (!$this->ExtraRequirement->exists()) {
			throw new NotFoundException(__('Invalid extra requirement'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ExtraRequirement->delete()) {
			$this->Session->setFlash(__('The extra requirement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The extra requirement could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	
}
