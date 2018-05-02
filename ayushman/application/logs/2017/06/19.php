<?php defined('SYSPATH') or die('No direct script access.'); ?>

2017-06-19 00:26:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 00:26:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 00:45:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 00:45:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 01:09:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 01:09:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 03:09:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 03:09:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 05:32:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 05:32:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 05:57:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 05:57:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 06:32:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 06:32:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 07:00:01 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
2017-06-19 07:00:01 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
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
2017-06-19 07:45:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 07:45:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 07:45:20 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL apple-app-site-association was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-06-19 07:45:20 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL apple-app-site-association was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-06-19 07:48:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 07:48:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 07:49:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 07:49:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 07:50:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use3.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 07:50:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use3.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 07:50:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 07:50:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 07:50:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 07:50:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:26:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:26:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:26:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:26:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:26:53 --- ERROR: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('313')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('313')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
2017-06-19 11:26:53 --- STRACE: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('313')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('313')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('313')
#1 [internal function]: Controller_Cconsultation->action_getmyclinics()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-06-19 11:26:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:26:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:30:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:30:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:30:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:30:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:30:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:30:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:31:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:31:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:31:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:31:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:31:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:31:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:31:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:31:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 11:31:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 11:31:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 12:20:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 12:20:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 12:20:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 12:20:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 12:20:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 12:20:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 12:58:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 12:58:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 13:08:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 13:08:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 13:18:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 13:18:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 14:07:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 14:07:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 14:31:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/201_15082012192348.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 14:31:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/201_15082012192348.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:04:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:04:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: atom.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: atom.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.atom ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.atom ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rdf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rdf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: rss.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: rss.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rss ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rss ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: atom.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: atom.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.atom ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.atom ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rdf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rdf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: rss.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: rss.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rss ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:18:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rss ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:18:36 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL blog was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-06-19 15:18:36 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL blog was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-06-19 15:18:37 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL feed was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-06-19 15:18:37 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL feed was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-06-19 15:18:38 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL blog/feed was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-06-19 15:18:38 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL blog/feed was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-06-19 15:46:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.shtmlrobots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:46:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.shtmlrobots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:46:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/termsofuse.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:46:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/termsofuse.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:46:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/about.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:46:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/about.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:46:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/returnpolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:46:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/returnpolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:46:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/privacypolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:46:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/privacypolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:46:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/mission.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:46:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/mission.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 15:46:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/disclaimer.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 15:46:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/disclaimer.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 17:00:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 17:00:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 17:06:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 17:06:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 17:06:30 --- ERROR: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('57')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('57')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
2017-06-19 17:06:30 --- STRACE: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('57')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('57')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('57')
#1 [internal function]: Controller_Cconsultation->action_getmyclinics()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-06-19 17:06:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 17:06:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 17:10:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 17:10:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 17:13:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 17:13:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 17:13:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 17:13:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 17:13:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 17:13:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 17:13:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 17:13:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 17:14:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 17:14:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 17:56:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 17:56:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 18:09:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 18:09:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 18:45:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 18:45:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 18:45:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 18:45:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 18:50:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 18:50:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 19:01:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 19:01:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 19:01:37 --- ERROR: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('313')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('313')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
2017-06-19 19:01:37 --- STRACE: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('313')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('313')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('313')
#1 [internal function]: Controller_Cconsultation->action_getmyclinics()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-06-19 19:01:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 19:01:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 19:04:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 19:04:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 19:08:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 19:08:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 19:08:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 19:08:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 19:08:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 19:08:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 19:08:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 19:08:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 19:08:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 19:08:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 19:57:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 19:57:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 20:36:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 20:36:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:40:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: atom.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:40:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: atom.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:40:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.atom ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:40:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.atom ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:40:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rdf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:40:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rdf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:40:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: rss.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:40:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: rss.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:40:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:40:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:40:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rss ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:40:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rss ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:40:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: atom.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:40:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: atom.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:41:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.atom ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:41:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.atom ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:41:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rdf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:41:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rdf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:41:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: rss.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:41:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: rss.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:41:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:41:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:41:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rss ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 21:41:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.rss ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-19 21:41:18 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL blog was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-06-19 21:41:18 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL blog was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-06-19 21:41:19 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL feed was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-06-19 21:41:19 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL feed was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-06-19 21:41:20 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL blog/feed was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-06-19 21:41:20 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL blog/feed was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-06-19 22:40:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-19 22:40:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}