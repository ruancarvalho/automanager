<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {

    //var $scaffold;

    public $components = array('Paginator');

    public $paginate = array(
        'limit' => 20,
        'order' => array(
            'Order.date' => 'desc',
            'Order.id' => 'desc'
        )
    );

    public $uses = array('Order', 'Method', 'Product', 'OrderPayment', 'Vehicle', 'Customer');

    public $helpers = array('Js' => array('Jquery'));

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        $this->Paginator->settings = $this->paginate;

        $this->Order->recursive = 2;
        $this->set('orders', $this->Paginator->paginate());
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
                        
                        $this->Product->id = $product['Product']['id'];
                        $this->Product->issue($item['quantity']);

                        $item['order_id'] = $this->Order->id;
                        $item['price'] = $product['Product']['price'];
                        $item['total'] = $product['Product']['price'] * $item['quantity'];

                        $total += $item['total'];

                        $this->Order->OrderItem->create();
                        $this->Order->OrderItem->save($item);
                    }
                }

                // Atualiza o Valor Total da Venda com Desconto
                $total = $total - $this->data['Order']['discount'];                
                $this->Order->saveField('total', $total);				

                //$this->Session->setFlash(__('The order has been saved'), 'flash/success');
                //$this->redirect(array('action' => 'checkout', $this->Order->id));
                debug($this->data);

            } else {
                $this->Session->setFlash(
                        __('The order could not be saved. Please, try again.'), 
                        'flash/error'
                );
            } 
             
            $order = $this->Order;
            $this->set(compact('order'));
        }

        $this->set('vehicles', $this->Order->Vehicle->find('list', array('order' => 'Vehicle.vin ASC')));
        $this->set('customers', $this->Order->Customer->find('list'));

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

/**
 * checkout method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
    public function checkout($id = null) {

        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            $data = $this->request->data['OrderPayment'];
            foreach ($data as $payment) {

                if ($payment['amount'] > 0) {
                    $this->Order->OrderPayment->create();
                    $this->Order->OrderPayment->save($payment);
                }
            }

            $this->Session->setFlash(__('The payment has been saved'), 'flash/success');
            $this->redirect(array('action' => 'view', $id));

        } else {
            $this->Order->recursive = 2;
            $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
            $this->request->data = $this->Order->find('first', $options);

            $order   = $this->request->data;
            $methods = $this->Method->find('all');
            $count   = count($methods);

            $this->set(compact('methods'));
            $this->set(compact('count'));
            $this->set(compact('order'));
        }
    }
}
