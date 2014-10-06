<?php
App::uses('AppModel', 'Model');
/**
 * Sale Model
 *
 * @property Company $Company
 * @property ProductSale $ProductSale
 */
class Sale extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
	
	public $validate = array(
		'km' => array(
				'decimal' => array(
					'rule' => array('decimal'),
					//'message' => 'Your custom message here',
					'allowEmpty' => false,
					'required' => true,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			)
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ProductSale' => array(
			'className' => 'ProductSale',
			'foreignKey' => 'service_order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
