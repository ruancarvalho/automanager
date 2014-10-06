<?php
App::uses('AppModel', 'Model');
/**
 * Vehicle Model
 *
 * @property Product $Product
 */
class Vehicle extends AppModel {

/**
 * Virtual field
 *
 * @var string
 */
  public $virtualFields = array(
    'name' => "CONCAT(Vehicle.vin, ' - ', Vehicle.make, ' ', Vehicle.model)"
  );

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'vin' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'make' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'model' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'year' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      )
    )
  );

  //The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * hasMany associations
 *
 * @var array
 */
  public $hasMany = array(
    'Order' => array(
      'className' => 'Order',
      'foreignKey' => 'vehicle_id'
    )
  );

/**
 * belongsTo associations
 *
 * @var array
 */
  public $belongsTo = array(

    'Customer' => array(
      'className' => 'Customer',
      'foreignKey' => 'customer_id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    )
  );
}
