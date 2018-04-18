<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 * @property Post $Post
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
	        'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '請提供電郵地址'
            ),			
			'email' => array(
				'rule' => array('email', true),
				'message' => '請提供有效電郵'
			),
			'isUnique' => array(
				'rule' => array('isUnique', array('username'), false),
				'message' => '你輸入的電郵已登記'
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '請提供登入密碼',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'confirm_password' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => '請輸入登入密碼'
			),
			'matchPasswords' => array(
				'rule' => array('identicalFieldValues', 'password' ),
				'message' => '你的密碼不正確'
			)
        ),	
        'old_password' => array(
    		'rule' => 'password_verifies',
    		'message' => 'wrong'
		),
        'role' => array(
			'notEmpty' => array(
				'rule'    => 'notEmpty',
				'message' => '請選擇'
			),
        ),	
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'contact_person' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '請提供聯絡人名稱'
            )
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasOne = array(
		'Profile' => array(
			'className' => 'Profile',
			'foreignKey' => 'user_id',
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
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'user_id',
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

	public $hasAndBelongsToMany = array(
		'Order' => array(
			'className' => 'Order',
			'joinTable' => 'users_orders',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'order_id',
			'unique' => 'keepExisting',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);		

    public function beforeSave($options = array()) {
    	$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    	return true;
    }	

    public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        }
        return array('Group' => array('id' => $groupId));
    }   

    public function bindNode($user) {
    	return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}
	/*
	 * Custom Validation - Match Field Values
	 */
 	function identicalFieldValues( $field=array(), $compare_field=null ){ 
        foreach( $field as $key => $value ){ 
            $v1 = $value; 
            $v2 = $this->data[$this->name][ $compare_field ];                  
            if($v1 !== $v2) { 
                return FALSE; 
            } else { 
                continue; 
            } 
        } 
        return TRUE; 
	} 	
	public function password_verifies() {
    	//$this->User->id = $this->data[$this->alias]['id'];
    	//return AuthComponent::password($this->data[$this->alias]['password']) == $this->User->field('password');
    	$od = AuthComponent::password($this->data['User']['old_password']);
    	if($od == $this->field('password')) {
    	    return true;
    	}
    	return false;
	}
}
