<?php
App::uses('Profile', 'Model');

/**
 * Profile Test Case
 *
 */
class ProfileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.profile',
		'app.user',
		'app.group',
		'app.post',
		'app.first_condition',
		'app.comment',
		'app.student',
		'app.condition',
		'app.extra_requirement',
		'app.requirement',
		'app.posts_requirement',
		'app.subject',
		'app.posts_subject',
		'app.order',
		'app.users_order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Profile = ClassRegistry::init('Profile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Profile);

		parent::tearDown();
	}

}
