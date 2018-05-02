<?php defined('SYSPATH') or die('No direct script access.');
class Model_testmaster extends kohana_Ayushmanorm {
	protected $_table_name = 'testmasters';	
	protected $_has_many = array('tests' => array('model' => 'test', 'foreign_key' => 'reftreatdieseasid_c'));
}