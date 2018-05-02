<?php defined('SYSPATH') or die('No direct access allowed.');

return array
(
'driver' => 'smtp',
'options' => array(
                            'hostname'=>'secure.emailsrvr.com', 
							'port'=>'465', 
							'username'=>'inhlth@indiaonlinehealth.com', 
							'password'=>'Ayushm@n',
							'encryption'=>'ssl'
                        )
);