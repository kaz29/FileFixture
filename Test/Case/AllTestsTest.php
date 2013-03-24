<?php
class AllTestsTest extends PHPUnit_Framework_TestSuite {

/**
 * suite method, defines tests for this suite.
 *
 * @return void
 */
	public static function suite()
	{
		$suite = new CakeTestSuite('All tests');

		$suite->addTestDirectory(App::PluginPath('FileFixture') . 'Test' . DS . 'Case' . DS . 'Lib');
		$suite->addTestDirectory(App::PluginPath('FileFixture') . 'Test' . DS . 'Case' . DS . 'TestSuite');

		return $suite;
	}
}
