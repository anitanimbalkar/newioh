<?php defined('SYSPATH') or die('No direct script access.'); ?>

2017-06-26 01:34:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 01:34:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 01:35:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 01:35:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 02:14:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 02:14:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 04:07:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 04:07:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 06:29:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 06:29:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 06:45:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 06:45:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 06:50:10 --- ERROR: Exception [ 0 ]: exception 'ErrorException' with message 'Trying to get property of non-object' in /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php:11
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php(11): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 11, Array)
#1 [internal function]: Controller_Cpatientdashboard->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cpatientdashboard.php [ 20 ]
2017-06-26 06:50:10 --- STRACE: Exception [ 0 ]: exception 'ErrorException' with message 'Trying to get property of non-object' in /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php:11
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php(11): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 11, Array)
#1 [internal function]: Controller_Cpatientdashboard->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cpatientdashboard.php [ 20 ]
--
#0 [internal function]: Controller_Cpatientdashboard->action_view()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientdashboard))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2017-06-26 06:50:11 --- ERROR: Exception [ 0 ]: exception 'ErrorException' with message 'Trying to get property of non-object' in /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php:11
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php(11): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 11, Array)
#1 [internal function]: Controller_Cpatientdashboard->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cpatientdashboard.php [ 20 ]
2017-06-26 06:50:11 --- STRACE: Exception [ 0 ]: exception 'ErrorException' with message 'Trying to get property of non-object' in /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php:11
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php(11): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 11, Array)
#1 [internal function]: Controller_Cpatientdashboard->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cpatientdashboard.php [ 20 ]
--
#0 [internal function]: Controller_Cpatientdashboard->action_view()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientdashboard))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2017-06-26 06:50:11 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 1907 ]
2017-06-26 06:50:11 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 1907 ]
--
#0 /var/www/html/ayushman/application/classes/controller/newcemrdashboard.php(1907): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 1907, Array)
#1 [internal function]: Controller_Newcemrdashboard->action_getmessages()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Newcemrdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-06-26 07:00:01 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
2017-06-26 07:00:01 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
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
2017-06-26 11:42:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.shtmlrobots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 11:42:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.shtmlrobots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 11:42:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/disclaimer.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 11:42:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/disclaimer.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 11:42:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/about.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 11:42:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/about.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 11:42:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/privacypolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 11:42:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/privacypolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 11:42:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/termsofuse.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 11:42:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/termsofuse.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 11:42:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/returnpolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 11:42:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/returnpolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 11:42:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/mission.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 11:42:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/mission.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 13:22:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 13:22:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 14:44:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 14:44:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 14:45:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 14:45:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 15:03:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 15:03:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 15:04:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 15:04:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:28:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:28:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:28:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:28:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:40:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:40:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:40:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:40:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:40:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:40:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:44:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:44:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:44:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload-shim(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:44:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload-shim(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:44:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:44:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:44:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:44:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:48:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use3.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:48:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use3.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:51:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:51:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:51:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload-shim(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:51:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload-shim(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:51:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:51:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:53:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-warning.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:53:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-warning.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:53:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:53:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:54:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-warning.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:54:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-warning.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 18:54:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 18:54:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 19:11:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 19:11:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 19:11:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 19:11:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 19:11:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 19:11:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 19:25:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 19:25:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 19:35:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 19:35:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 22:18:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 22:18:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-26 23:36:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-26 23:36:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}