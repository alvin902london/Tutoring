<?php
App::uses('BetweenController', 'Controller');
/**
 * Profiles Controller
 *
 * @property Profile $Profile
 * @property PaginatorComponent $Paginator
 */
class ProfilesController extends BetweenController {

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
		$this->Profile->recursive = 0;
		$this->set('profiles', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->Profile->recursive = 0;
		$this->set('profiles', $this->Paginator->paginate());
	}	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$this->set('profile', $this->Profile->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$this->set('profile', $this->Profile->find('first', $options));
	}	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Profile->create();
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		}
		$users = $this->Profile->User->find('list');
		$this->set(compact('users'));

		$data = array(
		    //'stepNumber' => $stepNumber,
		    'select_districts' => $this->select_districts,
		    'select_subjects' => $this->select_subjects,
		    //'select_frequency' => $this->select_frequency,
		    //'select_duration' => $this->select_duration,
		    //'select_condition' => $this->select_condition,
		    //'select_first_condition' => $this->select_first_condition,
		    //'select_rate' => $this->select_rate,
		    'select_tutor_type1' => $this->select_tutor_type1,
		    'select_tutor_type2' => $this->select_tutor_type2,
		    'select_gender' => $this->select_gender,
		    //'select_grade' => $this->select_grade,
		    //'select_number' => $this->select_number,
		    'select_year' => $this->select_year
		);
		$this->set($data);
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Profile->create();
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		}
		$users = $this->Profile->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved.'), 'alert_box', array('class' => 'alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
			$this->request->data = $this->Profile->find('first', $options);
		}
		$users = $this->Profile->User->find('list');
		$this->set(compact('users'));
	}

	public function admin_edit($id = null) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
			$this->request->data = $this->Profile->find('first', $options);
		}
		$users = $this->Profile->User->find('list');
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
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Profile->delete()) {
			$this->Session->setFlash(__('The profile has been deleted.'), 'alert_box', array('class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('The profile could not be deleted. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Profile->delete()) {
			$this->Session->setFlash(__('The profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}	


	public function beforeFilter() {
		parent::beforeFilter();
	
	    // For CakePHP 2.1 and up
	    //$this->Auth->allow('initDB');
	    $this->Auth->allow('index', 'view', 'add', 'msf_setup', 'msf_step');
	}

    public function beforeRender() {
            parent::beforeRender();
            $params = $this->Session->read('form2.params');
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
     * this method is executed before starting the form and retrieves one important parameter:
     * the form steps number
     * you can hardcode it, but in this example we are getting it by counting the number of files that start with msf_step_
     */
    public function msf_setup() {
        App::uses('Folder', 'Utility');
        if ($this->Session->read('Auth.User')) {
        	$this->Session->delete('form2');
        	$profilesViewFolder = new Folder(APP.'View'.DS.'Profiles');
        	$steps = count($profilesViewFolder->find('msf_step_.*\.ctp'));
        	$this->Session->write('form2.params.steps', $steps);
        	$this->Session->write('form2.params.maxProgress', 0);
        	$this->redirect(array('action' => 'msf_step', 1));
    	} else {
	        return $this->redirect(array('controller' => 'users', 'action' => 'add', 'ref' => 'profile'));
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
		if (null == ($this->Session->read('form2.params.steps'))) {
			$this->redirect(array('action' => 'msf_setup'));
		}   
		if ($stepNumber == '2') {
			$source = $this->Session->read('form2.data');
			$this->set('source', $source);
			$subjects[] = array();
			foreach ($source['Subject']['Subject'] as $key => $value) {
				$subject = $this->Profile->Subject->findById($value); 		
				array_push($subjects, $subject['Subject']['name']);
			}	
			array_shift($subjects);			
	    	$this->set('subjects', $subjects);
		}			



		$data = array(
		    'stepNumber' => $stepNumber,
		    'select_districts' => $this->select_districts,
		    'select_subjects' => $this->select_subjects,
		    //'select_frequency' => $this->select_frequency,
		    //'select_duration' => $this->select_duration,
		    //'select_condition' => $this->select_condition,
		    //'select_first_condition' => $this->select_first_condition,
		    //'select_rate' => $this->select_rate,
		    'select_profile_tutor_type' => $this->select_profile_tutor_type,
		    'select_profile_tutor_type_education' => $this->select_profile_tutor_type_education,    
		    'select_profile_tutor_type_music' => $this->select_profile_tutor_type_music,
		    'select_profile_tutor_type_language' => $this->select_profile_tutor_type_language,		    
		    'select_gender' => $this->select_gender,
		    'select_grade' => $this->select_grade,
		    //'select_number' => $this->select_number,
		    'select_year' => $this->select_year
		);
		$this->set($data);    	
    	
        /**;
         * check if a view file for this step exists, otherwise redirect to index
         */
        if (!file_exists(APP.'View'.DS.'Profiles'.DS.'msf_step_'.$stepNumber.'.ctp')) {
            $this->redirect('/profiles/msf_setup');
        }
        /**
         * determines the max allowed step (the last completed + 1)
         * if choosen step is not allowed (URL manually changed) the user gets redirected
         * otherwise we store the current step value in the session
         */
        $maxAllowed = $this->Session->read('form2.params.maxProgress') + 1;
        if ($stepNumber > $maxAllowed) {
            $this->redirect('/profiles/msf_step/'.$maxAllowed);
        } else {
            $this->Session->write('form2.params.currentStep', $stepNumber);
        }
        /**
         * check if some data has been submitted via POST
         * if not, sets the current data to the session data, to automatically populate previously saved fields
         */
        if ($this->request->is('post')) { 

            /**
             * if data validates we merge previous session data with submitted data, using CakePHP powerful Hash class (previously called Set)
             */

            if ($this->Profile->saveAll($this->request->data, array('validate' => 'only', 'deep' => true))) {
            	
                $prevSessionData = $this->Session->read('form2.data');

                if ($stepNumber == '2') {
    				unset($prevSessionData['Subject']);	
	    	  		if (empty($this->request->data['Profile']['tutor_type_music'])) {
	    	  			unset($this->request->data['Profile']['tutor_type_music']);
				        unset($prevSessionData['Profile']['tutor_type_music']);
	    			} elseif (empty($this->request->data['Profile']['tutor_type_language'])) {
	    	  			unset($this->request->data['Profile']['tutor_type_language']);
				        unset($prevSessionData['Profile']['tutor_type_language']);
	    			}
    			}

                $currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
                /**
                 * if this is not the last step we replace session data with the new merged array
                 * update the max progress value and redirect to the next step
                 */
                if ($stepNumber < $this->Session->read('form2.params.steps')) {

                    $this->Session->write('form2.data', $currentSessionData);

                    if($stepNumber > $this->Session->read('form2.params.maxProgress')) {
                    	$this->Session->write('form2.params.maxProgress', $stepNumber);
                    }
                    
                    $this->redirect(array('action' => 'msf_step', $stepNumber+1));

                } else {
                    /**
                     * otherwise, this is the final step, so we have to save the data to the database
                     */             

                	if (AuthComponent::user('is_tutor') !== 1) {
                		$this->Profile->User->id = AuthComponent::user('id');
                		$this->Profile->User->saveField('is_tutor', '1', array('validate' => false, 'callbacks' => false));
                	} 
		            // The ID of the newly created user has been set
	            	// as $this->User->id.
	            	$currentSessionData['Profile']['user_id'] = $this->Profile->User->id;

					
					$this->Profile->User->saveField('mobile', $currentSessionData['User']['mobile'], array('validate' => false, 'callbacks' => false));
					unset($currentSessionData['User']);

					if ($this->Profile->saveAssociated($currentSessionData)) {
						$this->Session->setFlash(__('The post has been saved.'), 'alert_box', array('class' => 'alert-success'));
						$this->Session->delete('form');
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'alert_box', array('class' => 'alert-danger'));
					}  			              
                }
            }
        } else {
            $this->request->data = $this->Session->read('form2.data');
            if (AuthComponent::user()) {
	           $this->request->data['User']['username'] = AuthComponent::user('username');
	           $this->request->data['User']['contact_person'] = AuthComponent::user('contact_person');
            }
        }

        /**
         * here we load the proper view file, depending on the stepNumber variable passed via GET
         */
        $this->render('msf_step_'.$stepNumber);
    }		
}
