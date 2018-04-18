<?php
App::uses('AppModel', 'Model');
/**
 * Comment Model
 *
 * @property User $User
 * @property Post $Post
 */
class Comment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'post_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'frequency_not_ok' => array(
            'checkOne' => array(
                'rule'     => array('checkFrequency'),
                //'required' => true,
                'message'  => '如勾選，請另建議時間'
			),
		),
		//'frequency_remarks' => array(
        //    'checkOne' => array(
        //        'rule'     => array('checkOne', 'frequency_remarks', 'duration_remarks'),
        //        //'required' => true,
        //        'message'  => '請選擇'
		//	),
		//),	
		//'duration_remarks' => array(
        //    'checkOne' => array(
        //        'rule'     => array('checkOne', 'frequency_remarks', 'duration_remarks'),
        //        //'required' => true,
        //        'message'  => '請選擇'
		//	),
		//),	
		'rate_not_ok' => array(
            'checkOne' => array(
                'rule'     => array('checkRate'),
                //'required' => true,
                'message'  => '如勾選，請另建議學費'
			),
		),	
		'rate_remarks' => array(
            'checkOne' => array(
                'rule'     => array('checkRateRemarks'),
                //'required' => true,
                'message'  => '請建議學費'
			),
		),	
		//'rate_unit' => array(
        //    'checkOne' => array(
        //        'rule'     => array('checkOne', 'rate_remarks', 'rate_unit'),
        //        //'required' => true,
        //        'message'  => 'Please add'
		//	),
		//),								
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
