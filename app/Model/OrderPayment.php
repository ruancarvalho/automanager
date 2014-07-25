<?php
App::uses('AppModel', 'Model');

class OrderPayment extends AppModel {
    
    public $belongsTo = array(
        'Order'
    );
    
}