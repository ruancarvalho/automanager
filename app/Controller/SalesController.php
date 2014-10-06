<?php
App::uses('AppController', 'Controller');
/**
 * Sales Controller
 *
 * @property Sale $Sale
 */
class SalesController extends AppController {

    public $helpers = array('Js' => array('Jquery'));

    /**
     * index method
     *
     * @return void
     */
    public function index() {
            $this->Sale->recursive = 0;
            $this->set('sales', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {

            $this->Sale->recursive = 2;

            if (!$this->Sale->exists($id)) {
                    throw new NotFoundException(__('Invalid sale'));
            }
            $options = array('conditions' => array('Sale.' . $this->Sale->primaryKey => $id));
            $this->set('sale', $this->Sale->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
            
        if ($this->request->is('post')) {
            
            $this->Sale->create();
            
            if ($this->Sale->save($this->request->data)) {			

                $total = 0;

                foreach( $this->data['ProductSale'] as $item ) {

                    //$item = $this->data['ProductSale'][$i];

                    if ($item['product_id'] != NULL) {

                        $product = $this->Sale->ProductSale->Product->findById($item['product_id'], array('price'));
                        
                        if ($product['Product'] == null) {
                            $this->Session->setFlash(__('Product not Found'), 'flash/error');
                            $this->redirect(array('action' => 'index'));
                        }

                        $item['service_order_id'] = $this->Sale->id;
                        $item['total'] = $product['Product']['price'] * $item['quantity'];

                        $total += $item['total'];

                        $this->Sale->ProductSale->create();
                        $this->Sale->ProductSale->save($item);
                    }
                }

                // Atualiza o Valor Total da Venda
                $this->Sale->saveField('total', $total);				


                $this->Session->setFlash(__('The sale has been saved'), 'flash/success');
                $this->redirect(array('action' => 'view', $this->Sale->id));
             

            } else {
                $this->Session->setFlash(
                        __('The sale could not be saved. Please, try again.'), 
                        'flash/error'
                );
            } 
             
            $order = $this->Sale;
            $this->set(compact('order'));
        }
        $companies = $this->Sale->Company->find('list');
        $this->set(compact('companies'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Sale->id = $id;
		if (!$this->Sale->exists($id)) {
			throw new NotFoundException(__('Invalid sale'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sale->save($this->request->data)) {
				$this->Session->setFlash(__('The sale has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sale could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Sale.' . $this->Sale->primaryKey => $id));
			$this->request->data = $this->Sale->find('first', $options);
		}
		$companies = $this->Sale->Company->find('list');
		$this->set(compact('companies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Sale->id = $id;
		if (!$this->Sale->exists()) {
			throw new NotFoundException(__('Invalid sale'));
		}
		if ($this->Sale->delete()) {
			$this->Session->setFlash(__('Sale deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sale was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
