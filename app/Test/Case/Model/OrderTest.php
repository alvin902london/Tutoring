<?php
App::uses('Order', 'Model');

/**
 * Order Test Case
 *
 */
class OrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order',
		'app.transaction',
		'app.post',
		'app.user',
		'app.group',
		'app.comment',
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
		$this->Order = ClassRegistry::init('Order');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Order);

		parent::tearDown();
	}

}
