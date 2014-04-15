<?php
App::uses('AppController', 'Controller');
/**
 * PrinterManufacturers Controller
 *
 * @property PrinterManufacturer $PrinterManufacturer
 */
class PrinterManufacturersController extends AppController {



/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PrinterManufacturer->recursive = 0;
		$this->set('printerManufacturers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PrinterManufacturer->exists($id)) {
			throw new NotFoundException(__('Invalid printer manufacturer'));
		}
		$options = array('conditions' => array('PrinterManufacturer.' . $this->PrinterManufacturer->primaryKey => $id));
		$this->set('printerManufacturer', $this->PrinterManufacturer->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PrinterManufacturer->create();
			if ($this->PrinterManufacturer->save($this->request->data)) {
				$this->Session->setFlash(__('The printer manufacturer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printer manufacturer could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PrinterManufacturer->exists($id)) {
			throw new NotFoundException(__('Invalid printer manufacturer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PrinterManufacturer->save($this->request->data)) {
				$this->Session->setFlash(__('The printer manufacturer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printer manufacturer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PrinterManufacturer.' . $this->PrinterManufacturer->primaryKey => $id));
			$this->request->data = $this->PrinterManufacturer->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PrinterManufacturer->id = $id;
		if (!$this->PrinterManufacturer->exists()) {
			throw new NotFoundException(__('Invalid printer manufacturer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PrinterManufacturer->delete()) {
			$this->Session->setFlash(__('Printer manufacturer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Printer manufacturer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
