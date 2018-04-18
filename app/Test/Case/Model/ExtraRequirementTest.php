<?php
App::uses('ExtraRequirement', 'Model');

/**
 * ExtraRequirement Test Case
 *
 */
class ExtraRequirementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.extra_requirement',
		'app.post',
		'app.user',
		'app.group',
		'app.comment',
		'app.order',
		'app.users_order',
		'app.first_condition',
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
		$this->ExtraRequirement = ClassRegistry::init('ExtraRequirement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ExtraRequirement);

		parent::tearDown();
	}

}
