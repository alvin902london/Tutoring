<?php
App::uses('AppModel', 'Model');
/**
 * Condition Model
 *
 * @property Post $Post
 */
class Condition extends AppModel {

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
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請選擇時間',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'start' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請選擇時間'),
			'time' => array(
				'rule' => array('time'),
				'message' => '請選擇時間',
				//'allowEmpty' => false,
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
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請選擇時間'),
			'time' => array(
				'rule' => array('time'),
				'message' => '請選擇時間',
				//'allowEmpty' => false,
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
