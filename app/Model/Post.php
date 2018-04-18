<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property User $User
 */
class Post extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		//'email' => array(
        //    'notEmpty' => array(
        //        'rule'    => 'notEmpty',
        //        'message' => '請提供電郵地址'
        //    ),			
		//	'email' => array(
		//		'rule' => array('email', true),
		//		'message' => '請提供有效電郵'
		//	),
		//	'isUnique' => array(
		//		'rule' => array('isUnique', array('email'), false),
		//		'message' => '你輸入的電郵已登記'
		//	)
		//),
		'frequency' => array(
	    	'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '請選擇每週上課次數'
            )
		),
		'duration' => array(
	    	'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '請選擇每堂時間長度'
            )
		),		
		'first' => array(
	    	'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '請輸入最快上課日期'
            )
		),
		'district' => array(
	    	'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '請選擇補習地點'
            )
		),
		'estate' => array(
	    	'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '請提供屋苑名稱'
            )
		),
		'rate' => array(
            'numeric' => array(
                'rule'     => 'numeric',
                'message'  => '請輸入數字',
                'allowEmpty' => true
            ),	    
		),
        'Subject' => array( 
            'multiple' => array( 
                'rule' => array('multiple', array('min' => 1)), 
                'message' => '請選擇最少一個科目'), 
        ), 
		'student_grade' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請選擇學生級別',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),		
		),
        'agree' => array(
            'notEmpty' => array(
                'rule'     => array('comparison', '!=', 0),
                //'required' => true,
                'message'  => '請同意條款以使用本公司服務'
            )
        ),
        'tutor_type' => array(
            'notEmpty' => array(
                'rule'     => array('notEmpty'),
                //'required' => true,
                'message'  => '請選擇導師類型'
            )
        )        		  	
		//'user_id' => array(
		//	'numeric' => array(
		//		'rule' => array('numeric'),
		//		//'message' => 'Your custom message here',
		//		//'allowEmpty' => false,
		//		//'required' => false,
		//		//'last' => false, // Stop validation after this rule
		//		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		//	),
		//),
		//'title' => array(
		//	'notEmpty' => array(
		//		'rule' => 'notEmpty',
		//		'message' => 'Your custom message here',
		//		//'allowEmpty' => true,
		//		//'required' => false,
		//		//'last' => false, // Stop validation after this rule
		//		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		//	),
		//),
		//'condition_start_time' => array(
    	//    'rule' => array('time', '[H]H:MM[a|p]m'),
    	//    'message' => 'Please enter a valid time.'
    	//)
		//'contact_person' => array(
		//	'notEmpty' => array(
		//		'message' => 'Your custom message here',
		//		'allowEmpty' => false,
		//		//'required' => false,
		//		//'last' => false, // Stop validation after this rule
		//		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		//	),
		//),
		//'first_name' => array(
        //    'alphaNumeric' => array(
        //        'rule'     => 'alphaNumeric',
        //        'required' => true,
        //        'message'  => 'Letters and numbers only'
        //    ),
        //    'notEmpty' => array(
        //        'rule'    => 'notEmpty',
        //        'message' => 'Please enter your first name'
        //    )
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
		)
	);

	public $hasOne = array(
		'FirstCondition' => array(
			'className' => 'FirstCondition',
			'foreignKey' => 'post_id',
			'dependent' => true,
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

	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id',
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
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'post_id',
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
		'Condition' => array(
			'className' => 'Condition',
			'foreignKey' => 'post_id',
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
		'Requirement' => array(
			'className' => 'Requirement',
			'foreignKey' => 'post_id',
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
		'ExtraRequirement' => array(
			'className' => 'ExtraRequirement',
			'foreignKey' => 'post_id',
			'dependent' => true,
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

	public $hasAndBelongsToMany = array(
		'Subject' => array(
			'className' => 'Subject',
			'joinTable' => 'posts_subjects',
			'foreignKey' => 'post_id',
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
