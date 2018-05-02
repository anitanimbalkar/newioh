<?php

return array(

	'lib' => array(
		'class'  => 'AUTH', 
		'params' => array('a1')
	),

	'exception' => false,

	'roles' => array
	(
		'user' => 'guest',
		'admin' => 'user',
		'patient' => 'user',
		'doctor' => 'user',
		'pathologist' => 'user',
		'chemist' => 'user'
	),

	'guest_role' => 'guest',

	'resources' => array
	(
		'accountlinks' => NULL,
		'settings' => NULL,
		'emrmenu' => NULL
	),

	'rules' => array
	(
		'allow' => array
		(
			'patient' => array(
				'role'      => 'patient',
				'resource'  => array('accountlinks','emrmenu'),
				'privilege' => array('show'),
			),
			
			'doctor' => array(
				'role'      => 'doctor',
				'resource'  => array('accountlinks','settings'),
				'privilege' => array('show'),
			)
		),
		'deny' => array
		(
			 
		)
	)
);