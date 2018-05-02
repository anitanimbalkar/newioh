<?php defined('SYSPATH') or die('No direct script access.');
class Model_recommendedtest extends kohana_Ayushmanorm {
	protected $_table_name = 'recommendedtests';	
	protected $_has_many = array('testmasters' => array('model' => 'testmaster', 'foreign_key' => 'refrecomtestrecommtestid_c'));
}