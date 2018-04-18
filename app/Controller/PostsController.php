<?php
App::uses('BetweenController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends BetweenController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//Init Arrays
		$conditions = array('NOT' => array(
			'Post.is_ordered' => 1
			)
		);
		$joins = array();
		$group = null;
		//Check Keyword Filter
		if ($this->request->is('post')) {
			$keywords = $this->request->data('keywords');
			$search = empty($keywords);
			if(!$search) {
				$conditions = array(
					'OR' => array(
						'Subject.name LIKE' => "%" . $keywords . "%",
						'Post.title LIKE' => "%" . $keywords . "%",	
					),
					'NOT' => array(
						'Post.is_ordered' => 1
					)
				);				
				$joins[] = array(
					'table' => 'posts_subjects',
					'alias' => 'PostSubject',
					'type' => 'LEFT',
					'conditions' => array(
						'PostSubject.post_id = Post.id'
					)
				);
				$joins[] = array(
					'table' => 'subjects',
					'alias' => 'Subject',
					'type' => 'LEFT',
					'conditions' => array(
						'PostSubject.subject_id = Subject.id'
					)
				);
				$group = array('Post.id');
			}
		}
		$options = array(
			'conditions' => $conditions,
			'joins' => $joins,
			'group' => $group,
			'limit' => 10,
		);
		$this->Post->contain('Subject');
		$this->Paginator->settings = $options;
		//$this->Post->recursive = 1;
		$this->set('posts', $this->Paginator->paginate());
	}

	public function home() {
		//Init Arrays
		$conditions = array('NOT' => array(
			'Post.is_ordered' => 1
			)
		);
		$joins = array();
		$group = null;
		//Check Keyword Filter
		if ($this->request->is('post')) {
			$keywords = $this->request->data('keywords');
			$search = empty($keywords);
			if(!$search) {
				$conditions = array(
					'OR' => array(
						'Subject.name LIKE' => "%" . $keywords . "%",
						'Post.title LIKE' => "%" . $keywords . "%",	
					),
					'NOT' => array(
						'Post.is_ordered' => 1
					)
				);				
				$joins[] = array(
					'table' => 'posts_subjects',
					'alias' => 'PostSubject',
					'type' => 'LEFT',
					'conditions' => array(
						'PostSubject.post_id = Post.id'
					)
				);
				$joins[] = array(
					'table' => 'subjects',
					'alias' => 'Subject',
					'type' => 'LEFT',
					'conditions' => array(
						'PostSubject.subject_id = Subject.id'
					)
				);
				$group = array('Post.id');
			}
		}
		$options = array(
			'conditions' => $conditions,
			'joins' => $joins,
			'group' => $group,
			'limit' => 20,
		);
		$this->Post->contain('Subject');
		$this->Paginator->settings = $options;
		//$this->Post->recursive = 1;
		$this->set('posts', $this->Paginator->paginate());
	}	

	public function student() {

		/*
		 * Posts
		 */

		//Init Arrays
		$conditions = array(
			'NOT' => array(
				'Post.is_ordered' => 1
			),
			'AND' => array(
				'Post.user_id' => AuthComponent::user('id')
			)
		);
		$joins = array();
		$group = null;

		$options = array(
			'conditions' => $conditions,
			'joins' => $joins,
			'group' => $group,
			'limit' => 10,
		);
		$this->Post->contain('Subject');
		$this->Paginator->settings = $options;
		//$this->Post->recursive = 1;
		$this->set('posts', $this->Paginator->paginate());	

		/*
		 * Orders
		 */

		//Init Arrays
		$conditions = array(
			'NOT' => array(
				'Post.is_ordered' => 0
			),
			'AND' => array(
				'Post.user_id' => AuthComponent::user('id')
			)
		);
		$joins = array();
		$group = null;

		$options = array(
			'conditions' => $conditions,
			'joins' => $joins,
			'group' => $group,
			'limit' => 10,
		);
		$this->Post->contain('Subject');
		$this->Paginator->settings = $options;
		//$this->Post->recursive = 1;
		$this->set('posts_ordered', $this->Paginator->paginate());				
	}

	public function admin_index() {
		//Init Arrays
		$conditions = array();
		$joins = array();
		$group = null;
		//Check Keyword Filter
		if ($this->request->is('post')) {
			$keywords = $this->request->data('keywords');
			$search = empty($keywords);
			if(!$search) {
				$conditions = array('OR' => array(
					'Subject.name LIKE' => "%" . $keywords . "%",
					'Post.title LIKE' => "%" . $keywords . "%",	
					)
				);		
				$joins[] = array(
					'table' => 'students_subjects',
					'alias' => 'StudentSubject',
					'type' => 'LEFT',
					'conditions' => array(
						'StudentSubject.student_id = Student.id'
					)
				);
				$joins[] = array(
					'table' => 'subjects',
					'alias' => 'Subject',
					'type' => 'LEFT',
					'conditions' => array(
						'StudentSubject.subject_id = Subject.id'
					)
				);
				$group = array('Post.id');
			}
		}
		$options = array(
			'conditions' => $conditions,
			'joins' => $joins,
			'group' => $group,
			'limit' => 20,
		);
		$this->Post->contain('Subject', 'User');
		$this->Paginator->settings = $options;
		$this->Post->recursive = 2;
		$this->set('posts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		if ($this->Post->isOwnedby($id)) {
			$owner = true;
		} else {
			$owner = null;
		}
		$this->set('owner', $owner);

		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));

		$this->loadModel('Comment');
		$this->Paginator->settings = $this->paginate;
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate('Comment', array('Comment.post_id' => $id)));

		//$posts = $this->Post->find('list');
		//$comments = $this->Post->Comment->find('list');
		//$users = $this->Post->User->find('list');
		//$this->set(compact('posts', 'comments', 'users'));


	}	

	public function admin_view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));

		$this->loadModel('Comment');
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate('Comment'));	
	}

	public function private_view($id = null) {
		if (!$this->Post->exists($id) || $id = null) {
			throw new NotFoundException(__('Invalid post'));
		}

	}

/**
 * add method
 *
 * @return void
 */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->Post->create();
//			$this->request->data['Post']['user_id'] = AuthComponent::user('id');
//			unset($this->Post->Student->validate['post_id']);
//			$a = $this->request->data;
//			//print_r($a);
//			$b = array_splice($a, 6);
//			//print_r($b);
//			//die;
//			if ($this->Post->saveAssociated($b)) {
//				$this->Session->setFlash(__('The post has been saved.'), 'alert_box', array('class' => 'alert-success'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
//			}
//		}
//		$users = $this->Post->User->find('list', array('order' => array('User.id' => 'asc')));
//		$subjects = $this->Post->Subject->find('list');
//		$this->set(compact('users', 'subjects'));
//	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$users = $this->Post->User->find('list', array('order' => array('User.id' => 'asc')));
		$subjects = $this->Post->Subject->find('list');
		$this->set(compact('users', 'subjects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		if (!$this->Post->isOwnedby($id)) {
			$this->Session->setFlash(__('No, you cannot edit posts that aren\'t owned by you.'), 'alert_box', array('class' => 'alert-danger'));
			$this->redirect($this->referer());
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$users = $this->Post->User->find('list', array('order' => array('User.id' => 'asc')));
		$this->set(compact('users'));

//		$postId = (int) $this->request->params['pass'][0];
//		$this->set(compact('$postId'));
	}

	public function admin_edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		if (!$this->Post->isOwnedby($id)) {
			$this->Session->setFlash(__('No, you cannot edit posts that aren\'t owned by you.'));
			$this->redirect($this->referer());
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$users = $this->Post->User->find('list', array('order' => array('User.id' => 'asc')));
		$this->set(compact('users'));
	}	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}

		if (!$this->Post->isOwnedby($id)) {
			$this->Session->setFlash(__('No, you cannot delete posts that aren\'t owned by you.'), 'alert_box', array('class' => 'alert-danger'));
			$this->redirect($this->referer());
		}

		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'), 'alert_box', array('class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}

		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'msf_setup', 'msf_step', 'home');
	}


    /**
     * use beforeRender to send session parameters to the layout view
     */
    public function beforeRender() {
        parent::beforeRender();
        $params = $this->Session->read('form.params');
        $this->set('params', $params);

		$model = Inflector::singularize($this->name); 
        foreach($this->{$model}->hasAndBelongsToMany as $k=>$v) { 
            if(isset($this->{$model}->validationErrors[$k])) 
            { 
                $this->{$model}->{$k}->validationErrors[$k] = $this->{$model}->validationErrors[$k]; 
            } 
        } 
    }

    /**
     * delete session values when going back to index
     * you may want to keep the session alive instead
     */
    public function msf_index() {
    	$this->Session->delete('form');
    }    

    /**
     * this method is executed before starting the form and retrieves one important parameter:
     * the form steps number
     * you can hardcode it, but in this example we are getting it by counting the number of files that start with msf_step_
     */
    public function msf_setup() {
    	App::uses('Folder', 'Utility');
    	if (AuthComponent::user()) {
        	$this->Session->delete('form');
        	$usersViewFolder = new Folder(APP.'View'.DS.'Posts');
        	$steps = count($usersViewFolder->find('msf_step_.*\.ctp'));
        	$this->Session->write('form.params.steps', $steps);
        	$this->Session->write('form.params.maxProgress', 0);
        	$this->redirect(array('action' => 'msf_step', 1));
    	} else {
	        return $this->redirect(array('controller' => 'users', 'action' => 'add', 'ref' => 'post'));
	    }
    }

    /**
     * this is the core step handling method
     * it gets passed the desired step number, performs some checks to prevent smart users skipping steps
     * checks fields validation, and when succeding, it saves the array in a session, merging with previous results
     * if we are at last step, data is saved
     * when no form data is submitted (not a POST request) it sets this->request->data to the values stored in session
     */
    public function msf_step($stepNumber) {
		if (null == ($this->Session->read('form.params.steps')) || !AuthComponent::user()) {
			$this->redirect(array('action' => 'msf_setup'));
		}

		if ($stepNumber == '2') {
			$source = $this->Session->read('form.data');
			$this->set('source', $source);
			$subjects[] = array();
			foreach ($source['Subject']['Subject'] as $key => $value) {
				$subject = $this->Post->Subject->findById($value); 		
				array_push($subjects, $subject['Subject']['name']);
			}	
			array_shift($subjects);			
	    	$this->set('subjects', $subjects);
		}		

		$data = array(
		    'stepNumber' => $stepNumber,
		    'select_districts' => $this->select_districts,
		    'select_subjects' => $this->select_subjects,
		    'select_frequency' => $this->select_frequency,
		    'select_duration' => $this->select_duration,
		    'select_condition' => $this->select_condition,
		    'select_first_condition' => $this->select_first_condition,
		    'select_rate' => $this->select_rate,
		    'select_tutor_type' => $this->select_tutor_type,
		    'select_gender' => $this->select_gender,
		    'select_grade' => $this->select_grade,
		    //'select_year' => $this->select_year,	    		    
		    'select_number' => $this->select_number
		);
		$this->set($data);
    	
        /**
         * check if a view file for this step exists, otherwise redirect to index
         */
        if (!file_exists(APP.'View'.DS.'Posts'.DS.'msf_step_'.$stepNumber.'.ctp')) {
                $this->redirect('/posts/msf_setup');
        }
        /**
         * determines the max allowed step (the last completed + 1)
         * if choosen step is not allowed (URL manually changed) the user gets redirected
         * otherwise we store the current step value in the session
         */
        $maxAllowed = $this->Session->read('form.params.maxProgress') + 1;
        if ($stepNumber > $maxAllowed) {
            $this->redirect('/posts/msf_step/'.$maxAllowed);
        } else {
            $this->Session->write('form.params.currentStep', $stepNumber);
        }

        /**
         * check if some data has been submitted via POST
         * if not, sets the current data to the session data, to automatically populate previously saved fields
         */
        if ($this->request->is('post')) {
    		if ($stepNumber == '1') {
    			array_splice($this->request->data, 0, 4);					  			
    		}
            /**
             * if data validates we merge previous session data with submitted data, using CakePHP powerful Hash class (previously called Set)
             */

            if ($this->Post->saveAll($this->request->data, array('validate' => 'only', 'deep' => true))) {
                $prevSessionData = $this->Session->read('form.data');

    			if ($stepNumber == '1') {
	    	  		if(empty($this->request->data['Post']['number'])) {
	    	  			unset($this->request->data['Post']['number']);
				        unset($prevSessionData['Post']['number']);
	    			}

	    	  		if(empty($this->request->data['FirstCondition']['week']) || empty($this->request->data['FirstCondition']['start']) || empty($this->request->data['FirstCondition']['end'])) {
				        unset($this->request->data['FirstCondition']);				        
				        unset($prevSessionData['FirstCondition']);
	    			}        	
    				unset($prevSessionData['Condition']);
    				unset($prevSessionData['Subject']);
    				unset($prevSessionData['ExtraRequirement']);
        			foreach ($this->request->data['ExtraRequirement'] as $key => $value) {
					    if (empty($value['name'])) {
					        unset($this->request->data['ExtraRequirement'][$key]);
					    }
					} 		
    			}

                $currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);

                /**
                 * if this is not the last step we replace session data with the new merged array
                 * update the max progress value and redirect to the next step
                 */
                if ($stepNumber < $this->Session->read('form.params.steps')) {
                    $this->Session->write('form.data', $currentSessionData);

                    if($stepNumber > $this->Session->read('form.params.maxProgress')) {
                    	$this->Session->write('form.params.maxProgress', $stepNumber);
                    }
                    
                    $this->redirect(array('action' => 'msf_step', $stepNumber+1));

                } else {
                    /**
                     * otherwise, this is the final step, so we have to save the data to the database
                     */                  
                	$currentSessionData['Post']['email'] = AuthComponent::user('username');
                	$currentSessionData['Post']['user_id'] = AuthComponent::user('id');
					$currentSessionData['Post']['contact_person'] = AuthComponent::user('contact_person');

					$currentSessionData['User']['mobile'] = $currentSessionData['Post']['mobile'];
					$this->Post->User->id = AuthComponent::user('id');
					$this->Post->User->saveField('mobile', $currentSessionData['User']['mobile'], array('validate' => false));

                	if (AuthComponent::user('is_student') !== 1) {
                		$this->Post->User->id = AuthComponent::user('id');
                		$this->Post->User->saveField('is_student', '1', array('validate' => false));
                	}

                    unset($currentSessionData['User']);

	    			if(empty($currentSessionData['Post']['rate'])) {
	    				$currentSessionData['Post']['rate'] = '導師自訂';
	    				unset($this->Post->validate['rate']);
	    			}

		    		$this->Post->create();
					unset($this->Post->Student->validate['post_id']);

					if ($this->Post->saveAssociated($currentSessionData, array('deep' => true))) {
						$this->Session->setFlash(__('The post has been saved.'), 'alert_box', array('class' => 'alert-success'));
						$this->Session->delete('form');
						return $this->redirect(array('action' => 'student'));
					} else {
						$this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
					}  			              
                }
            }
        } else {
            $this->request->data = $this->Session->read('form.data');
            if (AuthComponent::user()) {
	           $this->request->data['User']['username'] = AuthComponent::user('username');
	           $this->request->data['User']['contact_person'] = AuthComponent::user('contact_person');
	           $this->request->data['User']['mobile'] = AuthComponent::user('mobile');	           
            }
        }

        /**
         * here we load the proper view file, depending on the stepNumber variable passed via GET
         */
        $this->render('msf_step_' . $stepNumber);
    }

}