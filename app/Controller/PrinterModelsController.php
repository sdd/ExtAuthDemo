<?php
App::uses('AppController', 'Controller');
/**
 * PrinterModels Controller
 *
 * @property PrinterModel $PrinterModel
 */
class PrinterModelsController extends AppController {

	public $uses = array('PrinterModel', 'PrinterManufacturer');
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PrinterModel->recursive = 0;
		$this->set('printerModels', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PrinterModel->exists($id)) {
			throw new NotFoundException(__('Invalid printer model'));
		}
		$options = array('conditions' => array('PrinterModel.' . $this->PrinterModel->primaryKey => $id));
		$this->set('printerModel', $this->PrinterModel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PrinterModel->create();
			if ($this->PrinterModel->save($this->request->data)) {
				$this->Session->setFlash(__('The printer model has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printer model could not be saved. Please, try again.'));
			}
		}
		$manufacturers = $this->PrinterManufacturer->find('list');
		$this->set(compact('manufacturers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PrinterModel->exists($id)) {
			throw new NotFoundException(__('Invalid printer model'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PrinterModel->save($this->request->data)) {
				$this->Session->setFlash(__('The printer model has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printer model could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PrinterModel.' . $this->PrinterModel->primaryKey => $id));
			$this->request->data = $this->PrinterModel->find('first', $options);
		}
		$manufacturers = $this->PrinterModel->Manufacturer->find('list');
		$this->set(compact('manufacturers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PrinterModel->id = $id;
		if (!$this->PrinterModel->exists()) {
			throw new NotFoundException(__('Invalid printer model'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PrinterModel->delete()) {
			$this->Session->setFlash(__('Printer model deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Printer model was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
