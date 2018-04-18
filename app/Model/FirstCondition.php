<?php
App::uses('AppModel', 'Model');
/**
 * FirstCondition Model
 *
 * @property Post $Post
 */
class FirstCondition extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'week' => array(
			//'notEmpty' => array(
			//	'rule' => array('notEmpty'),
			//	//'message' => 'Your custom message here',
			//	//'allowEmpty' => false,
			//	//'required' => false,
			//	//'last' => false, // Stop validation after this rule
			//	//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
		'start' => array(
			'time' => array(
				'rule' => 'time',
				'message' => 'error',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'range' => array(
				'rule' => array('checkRange'),
				'message' => '合適時間不可少於上課時間'
			)			
		),
		'end' => array(
			'time' => array(
				'rule' => 'time',
				'message' => 'error',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'range' => array(
				'rule' => array('checkRange'),
				'message' => '合適時間不可少於上課時間'
			)			
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
