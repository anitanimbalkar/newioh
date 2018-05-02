<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-11-07 00:01:02 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2015-11-07 00:01:02 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
#1 /var/www/html/ayushman/application/classes/helper/export.php(3): include_once()
#2 /var/www/html/ayushman/application/classes/controller/cscript.php(3): include_once('/var/www/html/a...')
#3 /var/www/html/ayushman/system/classes/kohana/core.php(496): require('/var/www/html/a...')
#4 [internal function]: Kohana_Core::auto_load('controller_cscr...')
#5 [internal function]: spl_autoload_call('controller_cscr...')
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(85): class_exists('controller_cscr...')
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2015-11-07 00:01:02 --- ERROR: Undefined variable: plugin
2015-11-07 00:01:02 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/application/classes/kohana/exception.php(59): Kohana_Request->execute()
#10 /var/www/html/ayushman/system/classes/kohana/core.php(507): Kohana_Exception::handler(Object(ErrorException))
#11 [internal function]: Kohana_Core::auto_load('controller_cscr...')
#12 [internal function]: spl_autoload_call('controller_cscr...')
#13 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(85): class_exists('controller_cscr...')
#14 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#15 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#16 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#17 {main}
2015-11-07 00:01:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-11-07 00:01:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-11-07 11:38:51 --- ERROR: Incorrect key file for table '/tmp/#sql_6ea_6.MYI'; try to repair it [ SELECT `patientappointments`.* FROM `patientappointments` AS `patientappointments` WHERE `id` = '22895' LIMIT 1 ]
2015-11-07 11:38:51 --- ERROR: Incorrect key file for table '/tmp/#sql_6ea_11.MYI'; try to repair it [ SELECT `patientappointments`.* FROM `patientappointments` AS `patientappointments` WHERE `id` = '22975' LIMIT 1 ]
2015-11-07 11:38:51 --- ERROR: Incorrect key file for table '/tmp/#sql_6ea_10.MYI'; try to repair it [ SELECT `patientappointments`.* FROM `patientappointments` AS `patientappointments` WHERE `id` = '22950' LIMIT 1 ]
2015-11-07 11:38:51 --- ERROR: #0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `patient...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(972): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(898): Kohana_ORM->_load_result(false)
#3 /var/www/html/ayushman/application/classes/kohana/ayushmanorm.php(46): Kohana_ORM->find()
#4 /var/www/html/ayushman/application/classes/controller/csendsmsbyatjob.php(6): kohana_Ayushmanorm->find()
#5 [internal function]: Controller_Csendsmsbyatjob->action_send()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Csendsmsbyatjob))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2015-11-07 11:38:51 --- ERROR: #0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `patient...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(972): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(898): Kohana_ORM->_load_result(false)
#3 /var/www/html/ayushman/application/classes/kohana/ayushmanorm.php(46): Kohana_ORM->find()
#4 /var/www/html/ayushman/application/classes/controller/csendsmsbyatjob.php(6): kohana_Ayushmanorm->find()
#5 [internal function]: Controller_Csendsmsbyatjob->action_send()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Csendsmsbyatjob))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2015-11-07 11:38:51 --- ERROR: #0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `patient...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(972): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(898): Kohana_ORM->_load_result(false)
#3 /var/www/html/ayushman/application/classes/kohana/ayushmanorm.php(46): Kohana_ORM->find()
#4 /var/www/html/ayushman/application/classes/controller/csendsmsbyatjob.php(6): kohana_Ayushmanorm->find()
#5 [internal function]: Controller_Csendsmsbyatjob->action_send()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Csendsmsbyatjob))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2015-11-07 11:38:52 --- ERROR: Incorrect key file for table '/tmp/#sql_6ea_4.MYI'; try to repair it [ SELECT `patientappointments`.* FROM `patientappointments` AS `patientappointments` WHERE `id` = '22972' LIMIT 1 ]
2015-11-07 11:38:52 --- ERROR: #0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `patient...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(972): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(898): Kohana_ORM->_load_result(false)
#3 /var/www/html/ayushman/application/classes/kohana/ayushmanorm.php(46): Kohana_ORM->find()
#4 /var/www/html/ayushman/application/classes/controller/csendsmsbyatjob.php(6): kohana_Ayushmanorm->find()
#5 [internal function]: Controller_Csendsmsbyatjob->action_send()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Csendsmsbyatjob))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2015-11-07 11:38:52 --- ERROR: Incorrect key file for table '/tmp/#sql_6ea_15.MYI'; try to repair it [ SELECT `patientappointments`.* FROM `patientappointments` AS `patientappointments` WHERE `id` = '23097' LIMIT 1 ]
2015-11-07 11:38:52 --- ERROR: #0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `patient...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(972): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(898): Kohana_ORM->_load_result(false)
#3 /var/www/html/ayushman/application/classes/kohana/ayushmanorm.php(46): Kohana_ORM->find()
#4 /var/www/html/ayushman/application/classes/controller/csendsmsbyatjob.php(6): kohana_Ayushmanorm->find()
#5 [internal function]: Controller_Csendsmsbyatjob->action_send()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Csendsmsbyatjob))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2015-11-07 11:38:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-11-07 11:38:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-11-07 11:38:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-11-07 11:38:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-11-07 11:38:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-11-07 11:38:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-11-07 11:38:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-11-07 11:38:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-11-07 11:38:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-11-07 11:38:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-11-07 17:18:45 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2015-11-07 17:18:52 --- ERROR: Exception [ 0 ]: Database_Exception [ 2 ]: mysql_connect(): Access denied for user 'root'@'localhost' (using password: NO) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
2015-11-07 17:18:52 --- STRACE: Exception [ 0 ]: Database_Exception [ 2 ]: mysql_connect(): Access denied for user 'root'@'localhost' (using password: NO) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
--
#0 [internal function]: Controller_Cuser->action_login()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cuser))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2015-11-07 17:23:05 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2015-11-07 17:23:10 --- ERROR: Exception [ 0 ]: Database_Exception [ 2 ]: mysql_connect(): Access denied for user 'root'@'localhost' (using password: NO) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
2015-11-07 17:23:10 --- STRACE: Exception [ 0 ]: Database_Exception [ 2 ]: mysql_connect(): Access denied for user 'root'@'localhost' (using password: NO) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
--
#0 [internal function]: Controller_Cuser->action_login()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cuser))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2015-11-07 17:24:47 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2015-11-07 17:25:57 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2015-11-07 17:26:03 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2015-11-07 17:26:03 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2015-11-07 17:26:04 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2015-11-07 17:26:12 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2015-11-07 17:26:13 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28