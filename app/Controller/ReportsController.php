<?php

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ReportsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Reports';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('ReportDRE');

	public function beforeFilter()
	{
		parent::beforeFilter();

		$this->Auth->allow('home');
	}
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index() {

	}
	
/**
 * @param mixed What report to display
 *      - month is current month
 *      - quarter is the last three months
 *      - year is the current year
 */
	public function dre($type = null, $year = null, $month = null) {
	
	    $results = array('ReportDRE' => array());
	
        if ($type != null) {
        
            if ($type == 'month') {
            
                $results = $this->ReportDRE->find('first', array(
                    'conditions' => array(
	                    'ReportDRE.year' => $year,
	                    'ReportDRE.month' => $month,
	                )
	            ));
            
            } elseif ($type == 'quarter') {
            
            } elseif ($type == 'year') {
            
            }
            
        } else {
            $year = date('Y');
            $month = date('m');
            
            $results = $this->ReportDRE->find('first', array(
                'conditions' => array(
	            'ReportDRE.year' => $year,
	            'ReportDRE.month' => $month,
	            )
	        ));
	    
        }
		
		$this->set('results', $results);
	}
}
