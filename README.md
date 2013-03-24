# FileFixture Plugin for CakePHP2.x

[![Build Status](https://travis-ci.org/kaz29/FileFixture.png)](https://travis-ci.org/kaz29/FileFixture)

## Feature

- Load fixture data from csv(Comma-Separated Values)/tsv(TAB-Separated Values) file
- Load master data from csv(Comma-Separated Values)/tsv(TAB-Separated Values)  file

## Requirements

- PHP >= 5.3.x
- CakePHP >= 2.0

## Installation

Put 'FileFixture' directory on app/Plugin or plugins in your CakePHP application.
Then, add the following code in bootstrap.php

    <?php
        CakePlugin::load('FileFixture');

## Usage

### FileTestFixture

	app/Test/Fixture/PostFixture.php
	<?php
	App::uses('FileTestFixture', 'FileFixture.TestSuite/Fixture');
	/**
	 * PostFixture
	 *
	 */
	class PostFixture extends FileTestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
			public $fields = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
			'title' => array('type' => 'string', 'null' => true, 'length' => 50),
			'body' => array('type' => 'text', 'null' => true, 'length' => 1073741824),
			'created' => array('type' => 'datetime', 'null' => true),
			'modified' => array('type' => 'datetime', 'null' => true),
			'indexes' => array(
				'PRIMARY' => array('unique' => true, 'column' => 'id')
			),
			'tableParameters' => array()
		);

		public $importRecords = array(
			// 'path' => [path to Fixture File Path], // Optional(default is 'app/Test/Fixture/Data/')
			'file' => 'posts.csv',
		);
	}

	app/Test/Fixture/Data/posts.csv
	title,body,created,modified
	"The title","This is the post body.","2011-06-20 23:10:57","2011-06-20 23:10:57"
	"A title once again","And the post body follows.","2011-06-20 23:10:57","2011-06-20 23:10:57"
	"Title strikes back","This is really exciting! Not.","2011-06-20 23:10:57","2011-06-20 23:10:57"

### FileImporter

	<?php
		$result = FileImporter::load('Prefecture', TESTS.'Fixture'.DS.'Data'.DS.'prefectures.csv');


#### Use with [Migrations Plugin](https://github.com/CakeDC/migrations)

	<?php
	class AddPrefectures extends CakeMigration {
	
	...
	
		public function after($direction) {
			if ($direction === 'up') {
				App::uses('Post', 'Model');
				return FileImporter::load('Prefecture', TESTS.'Fixture'.DS.'Data'.DS.'prefectures.csv');
			}

			return true;
		}
		
	…
	}

## License

The MIT License

Copyright (c) 2013 Kaz Watanabe(https://github.com/kaz29/)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.