<?php
use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;
class ExampleTest extends TestCase {

	public function setUp(){

	}
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
	//	$post =Factory::create('App\User');
		$role = Factory::create('App\Role');
	}

	/*public function tes_flash_display(){
		Flash::message('Display');
		$this->call('GET', '/');
		$this->see('Display ok');
	}*/

}
