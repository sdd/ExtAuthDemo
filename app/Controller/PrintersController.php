<?php
App::uses('AppController', 'Controller');
/**
 * Printers Controller
 *
 * @property Printer $Printer
 */
class PrintersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Printer->recursive = 0;
		$this->set('printers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Printer->exists($id)) {
			throw new NotFoundException(__('Invalid printer'));
		}
		$options = array('conditions' => array('Printer.' . $this->Printer->primaryKey => $id));
		$this->set('printer', $this->Printer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Printer->create();
			$data = $this->request->data;
			$data['Printer']['user_id'] = $this->Auth->user('id');
			if ($this->Printer->save($data)) {
				$this->Session->setFlash(__('The printer has been saved'));
				$this->redirect('/home');
			} else {
				$this->Session->setFlash(__('The printer could not be saved. Please, try again.'));
			}
		}
		//$users = $this->Printer->User->find('list');
		$printerModels = $this->Printer->PrinterModel->find('list');
		$locations = $this->Printer->Location->find('list');
		$this->set(compact('users', 'printerModels', 'locations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Printer->exists($id)) {
			throw new NotFoundException(__('Invalid printer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Printer->save($this->request->data)) {
				$this->Session->setFlash(__('The printer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Printer.' . $this->Printer->primaryKey => $id));
			$this->request->data = $this->Printer->find('first', $options);
		}
		//$users = $this->Printer->User->find('list');
		$printerModels = $this->Printer->PrinterModel->find('list');
		$locations = $this->Printer->Location->find('list');
		$this->set(compact('users', 'printerModels', 'locations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Printer->id = $id;
		if (!$this->Printer->exists()) {
			throw new NotFoundException(__('Invalid printer'));
		}
		//$this->request->onlyAllow('post', 'delete');
		if ($this->Printer->delete()) {
			$this->Session->setFlash(__('Printer deleted'));
			$this->redirect('/home');
		}
		$this->Session->setFlash(__('Printer was not deleted'));
		$this->redirect('/home');
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Printer->recursive = 0;
		$this->set('printers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Printer->exists($id)) {
			throw new NotFoundException(__('Invalid printer'));
		}
		$options = array('conditions' => array('Printer.' . $this->Printer->primaryKey => $id));
		$this->set('printer', $this->Printer->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Printer->create();
			if ($this->Printer->save($this->request->data)) {
				$this->Session->setFlash(__('The printer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printer could not be saved. Please, try again.'));
			}
		}
		//$users = $this->Printer->User->find('list');
		$printerModels = $this->Printer->PrinterModel->find('list');
		$locations = $this->Printer->Location->find('list');
		$this->set(compact('users', 'printerModels', 'locations'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Printer->exists($id)) {
			throw new NotFoundException(__('Invalid printer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Printer->save($this->request->data)) {
				$this->Session->setFlash(__('The printer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Printer.' . $this->Printer->primaryKey => $id));
			$this->request->data = $this->Printer->find('first', $options);
		}
		//$users = $this->Printer->User->find('list');
		$printerModels = $this->Printer->PrinterModel->find('list');
		$locations = $this->Printer->Location->find('list');
		$this->set(compact('users', 'printerModels', 'locations'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Printer->id = $id;
		if (!$this->Printer->exists()) {
			throw new NotFoundException(__('Invalid printer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Printer->delete()) {
			$this->Session->setFlash(__('Printer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Printer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
