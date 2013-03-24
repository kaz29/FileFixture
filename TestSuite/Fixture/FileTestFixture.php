<?php
App::uses('CakeTestFixture', 'TestSuite/Fixture');
App::uses('FileImporter', 'FileFixture.Lib');

class FileTestFixture extends CakeTestFixture {

	public function init()
	{
		parent::init();

		if (isset($this->importRecords) && !empty($this->importRecords)) {
			$this->_importRecords($this->importRecords);
		}
	}

	/**
	 * import fixture data from file
	 *
	 * @return void
	 **/
	protected function _importRecords($params)
	{
		$_default = array(
			'path' => TESTS.'Fixture'.DS.'Data'.DS,
			'file' => null,
		);
		$params = array_merge($_default, $params);

		$file = $params['path'].$params['file'];
		if (!file_exists($file) || !is_file($file)) {
			throw new Exception("Fixture data file not exists.({$file})", 1);
		}

		$this->records = FileImporter::import($file);
	}
}
