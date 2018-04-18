<?php
App::uses('Condition', 'Model');

/**
 * Condition Test Case
 *
 */
class ConditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.condition',
		'app.post',
		'app.user',
		'app.group',
		'app.comment',
		'app.order',
		'app.users_order',
		'app.student',
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
		$this->Condition = ClassRegistry::init('Condition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Condition);

		parent::tearDown();
	}

}
