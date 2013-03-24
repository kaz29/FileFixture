<?php
class FileImporter
{
	public static function load($modelName, $file)
	{
		$records = FileImporter::import($file);

		$Model = ClassRegistry::init($modelName);
		foreach ($records as $record) {
			$Model->create();
			if (!$Model->save($record, false)) {
				return false;
			}
		}
		return true;
	}

	public static function import($file)
	{
		$fileinfo = pathinfo($file);
		$method = "_importFrom".ucfirst(strtolower($fileinfo['extension']));
		if (!method_exists('FileImporter', $method)) {
			throw new Exception("Import Method not exists.({$method})", 1);
		}

		return FileImporter::{$method}($file);
	}

	/**
	 * import fixture data from csv file
	 *
	 * @return void
	 **/
	protected static function _importFromCsv($file)
	{
		$handle = fopen($file, 'r');
		$line = rtrim(fgets($handle));
		$fields = explode(',', $line);

		$records = array();
		while (($data = fgetcsv($handle, 8192, ',')) !== FALSE) {
			$record = array();
			foreach ($data as $k => $v) {
				$record[$fields[$k]] = $v;
			}
			$records[] = $record;
		}

		fclose($handle);
		return $records;
	}

	/**
	 * import fixture data from tsv file
	 *
	 * @return void
	 **/
	protected static function _importFromTsv($file)
	{
		$handle = fopen($file, 'r');
		$line = rtrim(fgets($handle));
		$fields = explode("\t", $line);

		$records = array();
		while (($data = fgetcsv($handle, 8192, "\t")) !== FALSE) {
			$record = array();
			foreach ($data as $k => $v) {
				$record[$fields[$k]] = $v;
			}
			$records[] = $record;
		}

		fclose($handle);
		return $records;
	}
}
