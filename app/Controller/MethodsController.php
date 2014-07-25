<?php
App::uses('AppController', 'Controller');
/**
 * Method Controller
 *
 * @property Method $Method
 * @property PaginatorComponent $Paginator
 */
class MethodsController extends AppController {

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
		$this->Method->recursive = 0;
		$this->set('methods', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Method->create();
			if ($this->Method->save($this->request->data)) {
				$this->Session->setFlash(__('The method has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The method could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Method->exists($id)) {
			throw new NotFoundException(__('Invalid method'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Method->save($this->request->data)) {
				$this->Session->setFlash(__('The method has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The method could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Method.' . $this->Method->primaryKey => $id));
			$this->request->data = $this->Method->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Method->id = $id;
		if (!$this->Method->exists()) {
			throw new NotFoundException(__('Invalid method'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Method->delete()) {
			$this->Session->setFlash(__('The method has been deleted.'));
		} else {
			$this->Session->setFlash(__('The method could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
