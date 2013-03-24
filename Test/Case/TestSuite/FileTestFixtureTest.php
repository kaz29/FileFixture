<?php
App::uses('DboSource', 'Model/Datasource');
App::uses('Model', 'Model');
App::uses('FileTestFixture', 'FileFixture.TestSuite/Fixture');

define('FILE_FIXTURE_DATA_PATH', App::PluginPath('FileFixture').'Test'.DS.'Fixture'.DS.'Data'.DS);

class FileTestFixtureImportFromCsvFixture extends FileTestFixture {
	public $name = 'FixtureTest';
	public $table = 'fixture_tests';
	public $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'name' => array('type' => 'string', 'length' => '255'),
		'created' => array('type' => 'datetime')
	);
	public $importRecords = array(
		'path' => FILE_FIXTURE_DATA_PATH,
		'file' => 'csv_test_fixture.csv',
	);
}

class FileTestFixtureImportFromCsvUTF8Fixture extends FileTestFixture {
	public $name = 'FixtureTest';
	public $table = 'fixture_tests';
	public $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'name' => array('type' => 'string', 'length' => '255'),
		'created' => array('type' => 'datetime')
	);
	public $importRecords = array(
		'path' => FILE_FIXTURE_DATA_PATH,
		'file' => 'csv_test_fixture_utf-8.csv',
	);
}

class FileTestFixtureImportFromTsvFixture extends FileTestFixture {
	public $name = 'FixtureTest';
	public $table = 'fixture_tests';
	public $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'name' => array('type' => 'string', 'length' => '255'),
		'created' => array('type' => 'datetime')
	);
	public $importRecords = array(
		'path' => FILE_FIXTURE_DATA_PATH,
		'file' => 'tsv_test_fixture.tsv',
	);
}

class FileTestFixtureImportFromTsvUTF8Fixture extends FileTestFixture {
	public $name = 'FixtureTest';
	public $table = 'fixture_tests';
	public $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'name' => array('type' => 'string', 'length' => '255'),
		'created' => array('type' => 'datetime')
	);
	public $importRecords = array(
		'path' => FILE_FIXTURE_DATA_PATH,
		'file' => 'tsv_test_fixture_utf-8.tsv',
	);
}
/**
 * Test case for CsvTestFixture
 *
 */
class CsvTestFixtureTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
	}

/**
 * tearDown
 *
 * @return void
 */
	public function tearDown() {
		parent::tearDown();
	}

/**
 * testImportFromCsvFile
 *
 * @return void
 */
	public function testImportFromCsvFile() {
		$Fixture = new FileTestFixtureImportFromCsvFixture();
		$Fixture->init();

		$expected = array(
			array(
				'name' => 'name-01,aaa',
				'created' => '2013/03/01 09:01:02',
			),
			array(
				'name' => 'name-02',
				'created' => '2013/03/01 10:01:02',
			),
		);
		$this->assertEqual($Fixture->records, $expected);
	}

/**
 * testImportFromCsvFileUTF8
 *
 * @return void
 */
	public function testImportFromCsvFileUTF8() {
		$Fixture = new FileTestFixtureImportFromCsvUTF8Fixture();
		$Fixture->init();

		$expected = array(
			array(
				'name' => '名前ー１',
				'created' => '2013/03/01 09:01:02',
			),
			array(
				'name' => '名前ー２',
				'created' => '2013/03/01 10:01:02',
			),
		);
		$this->assertEqual($Fixture->records, $expected);
	}

/**
 * testImportFromTsvFile
 *
 * @return void
 */
	public function testImportFromTsvFile() {
		$Fixture = new FileTestFixtureImportFromTsvFixture();
		$Fixture->init();

		$expected = array(
			array(
				'name' => "name-01\taaa",
				'created' => '2013/03/01 09:01:02',
			),
			array(
				'name' => 'name-02',
				'created' => '2013/03/01 10:01:02',
			),
		);
		$this->assertEqual($Fixture->records, $expected);
	}

/**
 * testImportFromTsvFileUTF8
 *
 * @return void
 */
	public function testImportFromTsvFileUTF8() {
		$Fixture = new FileTestFixtureImportFromTsvUTF8Fixture();
		$Fixture->init();

		$expected = array(
			array(
				'name' => '名前ー１',
				'created' => '2013/03/01 09:01:02',
			),
			array(
				'name' => '名前ー２',
				'created' => '2013/03/01 10:01:02',
			),
		);
		$this->assertEqual($Fixture->records, $expected);
	}
}
