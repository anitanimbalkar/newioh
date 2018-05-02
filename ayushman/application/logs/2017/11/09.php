<?php defined('SYSPATH') or die('No direct script access.'); ?>

2017-11-09 00:07:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 00:07:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 00:40:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 00:40:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 02:42:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 02:42:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 03:02:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 03:02:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 04:11:06 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: activationstatus_c' in /var/www/html/ayushman/application/classes/model/user.php:25
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(25): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 25, Array)
#1 /var/www/html/ayushman/application/classes/controller/cregistrar.php(182): Model_User->save_userdetails(Array)
#2 [internal function]: Controller_Cregistrar->action_register()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cregistrar))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cregistrar.php:185
Stack trace:
#0 [internal function]: Controller_Cregistrar->action_register()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cregistrar))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main} ~ APPPATH/classes/controller/cregistrar.php [ 222 ]
2017-11-09 04:11:06 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: activationstatus_c' in /var/www/html/ayushman/application/classes/model/user.php:25
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(25): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 25, Array)
#1 /var/www/html/ayushman/application/classes/controller/cregistrar.php(182): Model_User->save_userdetails(Array)
#2 [internal function]: Controller_Cregistrar->action_register()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cregistrar))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cregistrar.php:185
Stack trace:
#0 [internal function]: Controller_Cregistrar->action_register()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cregistrar))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main} ~ APPPATH/classes/controller/cregistrar.php [ 222 ]
--
#0 [internal function]: Controller_Cregistrar->action_register()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cregistrar))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2017-11-09 04:26:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 04:26:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 04:54:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 04:54:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 05:45:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 05:45:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 06:07:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 06:07:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 06:10:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 06:10:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 07:00:01 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
2017-11-09 07:00:01 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cprogrammanager.php(2): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 2, Array)
#1 /var/www/html/ayushman/application/classes/controller/cprogrammanager.php(2): include_once()
#2 /var/www/html/ayushman/system/classes/kohana/core.php(496): require('/var/www/html/a...')
#3 [internal function]: Kohana_Core::auto_load('controller_cpro...')
#4 [internal function]: spl_autoload_call('controller_cpro...')
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(85): class_exists('controller_cpro...')
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-11-09 08:11:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 08:11:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 09:02:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 09:02:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 09:47:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 09:47:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 09:47:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 09:47:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 11:22:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: javascript:void(0); ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 11:22:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: javascript:void(0); ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 11:52:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 11:52:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:04:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:04:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:04:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:04:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:05:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:05:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:05:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:05:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:05:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:05:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:05:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:05:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:05:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:05:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:05:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:05:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:12:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:12:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:12:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:12:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:12:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:12:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 12:12:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 12:12:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 15:14:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 15:14:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 15:14:58 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL assets/images/smallLogo was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-11-09 15:14:58 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL assets/images/smallLogo was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-11-09 16:12:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 16:12:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 16:12:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 16:12:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 16:46:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 16:46:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 17:12:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/201_15082012192348.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 17:12:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/201_15082012192348.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 18:10:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 18:10:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 19:20:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 19:20:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 19:20:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 19:20:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 19:39:06 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL apple-app-site-association was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-11-09 19:39:06 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL apple-app-site-association was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-11-09 19:57:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.shtmlrobots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 19:57:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.shtmlrobots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 19:58:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/about.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 19:58:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/about.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 19:58:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/mission.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 19:58:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/mission.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 19:58:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/termsofuse.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 19:58:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/termsofuse.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 19:58:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/disclaimer.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 19:58:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/disclaimer.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 19:58:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/privacypolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 19:58:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/privacypolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 19:58:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/returnpolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 19:58:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/returnpolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-11-09 22:19:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-11-09 22:19:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}