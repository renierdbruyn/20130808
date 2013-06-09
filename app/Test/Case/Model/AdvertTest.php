<?php
App::uses('Advert', 'Model');

/**
 * Advert Test Case
 *
 */
class AdvertTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.advert'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Advert = ClassRegistry::init('Advert');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Advert);

		parent::tearDown();
	}

}
