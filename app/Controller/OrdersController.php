<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {

    public $helpers = array('Js' => array('Jquery'));

    /**
     * index method
     *
     * @return void
     */
    public function index() {
            $this->Order->recursive = 0;
            $this->set('orders', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {

            $this->Order->recursive = 2;

            if (!$this->Order->exists($id)) {
                    throw new NotFoundException(__('Invalid order'));
            }
            $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
            $this->set('order', $this->Order->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
            
        if ($this->request->is('post')) {
            
            $this->Order->create();
            
            //if ($this->request->data) {         
            if ($this->Order->save($this->request->data)) {

                $total = 0;

                foreach( $this->data['OrderItem'] as $item ) {

                    //$item = $this->data['OrderItem'][$i];

                    if ($item['product_id'] != NULL) {
                        //print_r($this->data);
                        $product = 
                            $this->Order->OrderItem->Product->findById($item['product_id'], array('price'));
                        
                        if ($product['Product'] == null) {
                            $this->Session->setFlash(__('Product not Found'), 'flash/error');
                            $this->redirect(array('action' => 'index'));
                        }

                        $item['order_id'] = $this->Order->id;
                        $item['price'] = $product['Product']['price'];
                        $item['total'] = $product['Product']['price'] * $item['quantity'];

                        $total += $item['total'];

                        $this->Order->OrderItem->create();
                        $this->Order->OrderItem->save($item);
                    }
                }

                // Atualiza o Valor Total da Venda
                $this->Order->saveField('total', $total);				


                $this->Session->setFlash(__('The order has been saved'), 'flash/success');
                $this->redirect(array('action' => 'view', $this->Order->id));
             

            } else {
                $this->Session->setFlash(
                        __('The order could not be saved. Please, try again.'), 
                        'flash/error'
                );
            } 
             
            $order = $this->Order;
            $this->set(compact('order'));
        }
        $companies = $this->Order->Company->find('list');
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
        $this->Order->id = $id;
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$companies = $this->Order->Company->find('list');
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
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Order deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Order was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
