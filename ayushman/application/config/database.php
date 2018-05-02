<?php defined('SYSPATH') or die('No direct access allowed.');

return array
(
	'default' => array(
		'type'       => 'mysql',
		'connection' => array(
			'hostname'   => 'localhost:3306',
			'username'   => 'root',
			'password'   => 'Ayushm@n2018',
			'persistent' => FALSE,
			'database'   => 'livedb',
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	)
);
