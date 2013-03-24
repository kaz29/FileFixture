<?php
App::uses('CakeTestFixture', 'TestSuite/Fixture');

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

		$fileinfo = pathinfo($params['file']);

		$method = "_importFrom".ucfirst(strtolower($fileinfo['extension']));
		if (!method_exists($this, $method)) {
			throw new Exception("Import Method not exists.({$method})", 1);
		}

		$this->{$method}($file);
	}

	/**
	 * import fixture data from csv file
	 *
	 * @return void
	 **/
	protected function _importFromCsv($file)
	{
		$handle = fopen($file, 'r');
		$line = rtrim(fgets($handle));
		$fields = explode(',', $line);

		$this->records = array();
		while (($data = fgetcsv($handle, 8192, ',')) !== FALSE) {
			$record = array();
			foreach ($data as $k => $v) {
				$record[$fields[$k]] = $v;
			}
			$this->records[] = $record;
		}

		fclose($handle);
	}

	/**
	 * import fixture data from tsv file
	 *
	 * @return void
	 **/
	protected function _importFromTsv($file)
	{
		$handle = fopen($file, 'r');
		$line = rtrim(fgets($handle));
		$fields = explode("\t", $line);

		$this->records = array();
		while (($data = fgetcsv($handle, 8192, "\t")) !== FALSE) {
			$record = array();
			foreach ($data as $k => $v) {
				$record[$fields[$k]] = $v;
			}
			$this->records[] = $record;
		}

		fclose($handle);
	}
}
