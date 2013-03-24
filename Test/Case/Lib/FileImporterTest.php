<?php
App::uses('FileImporter', 'FileFixture.Lib');
App::uses('Model', 'Model');

define('FILE_IMPORTER_DATA_PATH', App::PluginPath('FileFixture').'Test'.DS.'Fixture'.DS.'Data'.DS);

class FileImporterModel extends Model {
	public $name = "Post";
	public $alias = "Post";
	public $useTable = 'posts';
}
/**
 * Test case for FileImporter
 *
 */
class FileImporterTest extends CakeTestCase {

	public $fixtures = array(
		'plugin.file_fixture.post'
	);
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

	public function testLoad() {
		$Model = ClassRegistry::init('FileImporterModel');

		$result = FileImporter::load('FileImporterModel', FILE_IMPORTER_DATA_PATH.'posts.csv');
		$this->assertTrue($result);

		$result = $Model->find('all', array('order' => 'id'));
		$expected = array(
			array(
				'Post' => array(
					'id' => 1,
					'title' => 'The title',
					'body' => 'This is the post body.',
					'created' => '2011-06-20 23:10:57',
					'modified' => '2011-06-20 23:10:57',
				),
			),
			array(
				'Post' => array(
					'id' => 2,
					'title' => 'A title once again',
					'body' => 'And the post body follows.',
					'created' => '2011-06-20 23:10:57',
					'modified' => '2011-06-20 23:10:57',
				),
			),
			array(
				'Post' => array(
					'id' => 3,
					'title' => 'Title strikes back',
					'body' => 'This is really exciting! Not.',
					'created' => '2011-06-20 23:10:57',
					'modified' => '2011-06-20 23:10:57',
				),
			),
		);
		$this->assertEqual($result, $expected);
	}

	public function testCsvImport() {
		$result = FileImporter::import(FILE_IMPORTER_DATA_PATH.'csv_test_fixture.csv');
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
		$this->assertEqual($result, $expected);

		$result = FileImporter::import(FILE_IMPORTER_DATA_PATH.'csv_test_fixture_utf-8.csv');
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
		$this->assertEqual($result, $expected);
	}

	public function testTsvImport() {
		$result = FileImporter::import(FILE_IMPORTER_DATA_PATH.'tsv_test_fixture.tsv');
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
		$this->assertEqual($result, $expected);

		$result = FileImporter::import(FILE_IMPORTER_DATA_PATH.'tsv_test_fixture_utf-8.tsv');
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
		$this->assertEqual($result, $expected);
	}
}
