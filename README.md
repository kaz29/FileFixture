# FileFixture: Load data from csv/tsv for UnitTest plugin for CakePHP

## Feature

- Load fixture data from csv(Comma-Separated Values) file
- Load fixture data from tsv(TAB-Separated Values) file

## Requirements

- PHP >= 5.2.6
- CakePHP >= 2.0

## Installation

Put 'FileFixture' directory on app/plugins in your CakePHP application.
Then, add the following code in bootstrap.php

    <?php
        CakePlugin::load('FileFixture');

## License

The MIT License

Copyright (c) 2013 Kaz Watanabe(https://github.com/kaz29/)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.