<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {

	public $components = array('RequestHandler', 'Paginator');
    public $helpers = array('Js' => array('Jquery'));

    public $paginate = array(
        'order' => array(
            'Product.created' => 'asc'
        )
    );

    public function info() {

    	$this->layout = null;

    	$product_id = $this->request->data['id'];

        $data = $this->Product->find('first', array(
            'conditions'=>array(
                'Product.id'=>$product_id
            ),
            'fields' => array('Product.name', 'Product.price'),
            )
        );

        $this->set('data', $data);
    }

	/**
	 *
	 */
    public function search() {

        if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}

		if (!empty($this->request->data)) {
        	$query = $this->request->data['Search Products'];
	    } else {
	        $this->Session->setFlash(__('Product not found. Please, try again.'), 'flash/error');
			$this->redirect(array('action' => 'index'));
	    }

        $this->Paginator->settings = $this->paginate;
		$this->Product->recursive = 0;

		$data = $this->Paginator->paginate(
		    'Product',
		    array('Product.name LIKE' => '%' . $query . '%')
		);

    	$this->set('products', $data);
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Paginator->settings = $this->paginate;

		$this->Product->recursive = 0;
		//$this->set('products', $this->Paginator->paginate());
		// similar to findAll(), but fetches paged results
    	$data = $this->Paginator->paginate('Product');
    	$this->set('products', $data);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$brands = $this->Product->Brand->find('list');
		$this->set(compact('brands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Product->id = $id;
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$brands = $this->Product->Brand->find('list');
		$this->set(compact('brands'));
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
