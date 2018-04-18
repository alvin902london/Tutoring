<?php
App::uses('District', 'Model');

/**
 * District Test Case
 *
 */
class DistrictTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.district',
		'app.post',
		'app.user',
		'app.group',
		'app.comment',
		'app.order',
		'app.users_order',
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
		$this->District = ClassRegistry::init('District');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->District);

		parent::tearDown();
	}

}
