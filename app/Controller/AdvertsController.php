<?php
App::uses('AppController', 'Controller');
/**
 * Adverts Controller
 *
 * @property Advert $Advert
 */
class AdvertsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Advert->recursive = 0;
		$this->set('adverts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Advert->exists($id)) {
			throw new NotFoundException(__('Invalid advert'));
		}
		$options = array('conditions' => array('Advert.' . $this->Advert->primaryKey => $id));
		$this->set('advert', $this->Advert->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Advert->create();
			if ($this->Advert->save($this->request->data)) {
				$this->Session->setFlash(__('The advert has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advert could not be saved. Please, try again.'));
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
		if (!$this->Advert->exists($id)) {
			throw new NotFoundException(__('Invalid advert'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Advert->save($this->request->data)) {
				$this->Session->setFlash(__('The advert has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advert could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Advert.' . $this->Advert->primaryKey => $id));
			$this->request->data = $this->Advert->find('first', $options);
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
		$this->Advert->id = $id;
		if (!$this->Advert->exists()) {
			throw new NotFoundException(__('Invalid advert'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Advert->delete()) {
			$this->Session->setFlash(__('Advert deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Advert was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
