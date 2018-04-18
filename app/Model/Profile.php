<?php
App::uses('AppModel', 'Model');
/**
 * Profile Model
 *
 * @property User $User
 */
class Profile extends AppModel {

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
		'full_name_en' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),				
				'message' => '請輸入英文全名',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'full_name_chi' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),				
				'message' => '請輸入中文全名',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gender' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),				
				'message' => '請選擇性別',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'birth_year' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),				
				'message' => '請選擇出生年份',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),				
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),		
		),
		'identity' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請輸入身份證號碼',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'district' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請選擇居住地區',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estate' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請提供屋苑名稱',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請提供詳細地址',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mobile' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '請提供手提電話號碼'
            ),			
            'numeric' => array(
                'rule'     => 'numeric',
                'message'  => '請輸入8位數字的香港手提電話號碼'	
            ),		
            'minLength' => array(
            	'rule' => array('minLength', '8'),
            	'message' => '請輸入8位數字的香港手提電話號碼'  
        	),
            'maxLength' => array(
            	'rule' => array('maxLength', '8'),
            	'message' => '請輸入8位數字的香港手提電話號碼'  
        	) 
		),	
		'tutor_type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請選擇導師類型',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tutor_type_education' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請選擇最高教育程度',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),	
		'tag' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請輸入宣傳標語',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),				
        'Subject' => array( 
            'multiple' => array( 
                'rule' => array('multiple', array('min' => 1)), 
                'message' => '請選擇最少一個科目'), 
        ), 
        'agree' => array(
            'notEmpty' => array(
                'rule'     => array('comparison', '!=', 0),
                //'required' => true,
                'message'  => '請同意條款以使用本公司服務'
            )
        )	
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
		)
	);

	public $hasMany = array(
		'Topic' => array(
			'className' => 'Topic',
			'foreignKey' => 'profile_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),	
	);

	public $hasAndBelongsToMany = array(
		'Subject' => array(
			'className' => 'Subject',
			'joinTable' => 'profiles_subjects',
			'foreignKey' => 'profile_id',
			'associationForeignKey' => 'subject_id',
			'unique' => 'keepExisting',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
	);		

	function beforeValidate($options = array()) {
		foreach($this->hasAndBelongsToMany as $k=>$v) {
			if(isset($this->data[$k][$k]))
			{
				$this->data[$this->alias][$k] = $this->data[$k][$k];
			}
		}
	}	
}
