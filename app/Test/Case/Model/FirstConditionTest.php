<?php
App::uses('FirstCondition', 'Model');

/**
 * FirstCondition Test Case
 *
 */
class FirstConditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.first_condition',
		'app.post',
		'app.user',
		'app.group',
		'app.comment',
		'app.order',
		'app.users_order',
		'app.student',
		'app.condition',
		'app.subject',
		'app.posts_subject'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FirstCondition = ClassRegistry::init('FirstCondition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FirstCondition);

		parent::tearDown();
	}

}
