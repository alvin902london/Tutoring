<?php
App::uses('Requirement', 'Model');

/**
 * Requirement Test Case
 *
 */
class RequirementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.requirement',
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
		$this->Requirement = ClassRegistry::init('Requirement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Requirement);

		parent::tearDown();
	}

}
