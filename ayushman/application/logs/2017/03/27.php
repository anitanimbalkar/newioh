<?php defined('SYSPATH') or die('No direct script access.'); ?>

2017-03-27 00:45:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 00:45:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 00:45:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/ServiceProviders.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 00:45:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/ServiceProviders.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 01:34:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 01:34:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 03:34:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 03:34:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 04:30:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Privacy Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 04:30:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Privacy Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 08:51:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 08:51:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 09:20:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 09:20:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 11:39:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 11:39:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 12:35:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 12:35:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 16:07:01 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
2017-03-27 16:07:01 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
--
#0 /var/www/html/ayushman/application/classes/controller/newcemrdashboard.php(595): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 595, Array)
#1 [internal function]: Controller_Newcemrdashboard->action_getAppData()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Newcemrdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:07:01 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
2017-03-27 16:07:01 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
--
#0 /var/www/html/ayushman/application/classes/controller/newcemrdashboard.php(595): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 595, Array)
#1 [internal function]: Controller_Newcemrdashboard->action_getAppData()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Newcemrdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:07:02 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
2017-03-27 16:07:02 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
--
#0 /var/www/html/ayushman/application/classes/controller/newcemrdashboard.php(595): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 595, Array)
#1 [internal function]: Controller_Newcemrdashboard->action_getAppData()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Newcemrdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:07:03 --- ERROR: ErrorException [ 1 ]: Call to a member function has() on a non-object ~ APPPATH/classes/controller/cconsultation.php [ 628 ]
2017-03-27 16:07:03 --- STRACE: ErrorException [ 1 ]: Call to a member function has() on a non-object ~ APPPATH/classes/controller/cconsultation.php [ 628 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2017-03-27 16:07:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 16:07:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 16:07:33 --- ERROR: ErrorException [ 1 ]: Call to a member function has() on a non-object ~ APPPATH/classes/controller/cconsultation.php [ 84 ]
2017-03-27 16:07:33 --- STRACE: ErrorException [ 1 ]: Call to a member function has() on a non-object ~ APPPATH/classes/controller/cconsultation.php [ 84 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2017-03-27 16:07:40 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
2017-03-27 16:07:40 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(570): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 570, Array)
#1 [internal function]: Controller_Cconsultation->action_getpatient()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:08:21 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
2017-03-27 16:08:21 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(570): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 570, Array)
#1 [internal function]: Controller_Cconsultation->action_getpatient()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:09:41 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
2017-03-27 16:09:41 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(570): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 570, Array)
#1 [internal function]: Controller_Cconsultation->action_getpatient()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:09:45 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
2017-03-27 16:09:45 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(570): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 570, Array)
#1 [internal function]: Controller_Cconsultation->action_getpatient()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:09:56 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
2017-03-27 16:09:56 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(570): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 570, Array)
#1 [internal function]: Controller_Cconsultation->action_getpatient()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:10:32 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
2017-03-27 16:10:32 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(570): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 570, Array)
#1 [internal function]: Controller_Cconsultation->action_getpatient()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:53:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 16:53:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 16:53:24 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
2017-03-27 16:53:24 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
--
#0 /var/www/html/ayushman/application/classes/controller/newcemrdashboard.php(595): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 595, Array)
#1 [internal function]: Controller_Newcemrdashboard->action_getAppData()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Newcemrdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:53:24 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
2017-03-27 16:53:24 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
--
#0 /var/www/html/ayushman/application/classes/controller/newcemrdashboard.php(595): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 595, Array)
#1 [internal function]: Controller_Newcemrdashboard->action_getAppData()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Newcemrdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:53:24 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
2017-03-27 16:53:24 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/newcemrdashboard.php [ 595 ]
--
#0 /var/www/html/ayushman/application/classes/controller/newcemrdashboard.php(595): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 595, Array)
#1 [internal function]: Controller_Newcemrdashboard->action_getAppData()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Newcemrdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:53:25 --- ERROR: ErrorException [ 1 ]: Call to a member function has() on a non-object ~ APPPATH/classes/controller/cconsultation.php [ 84 ]
2017-03-27 16:53:25 --- STRACE: ErrorException [ 1 ]: Call to a member function has() on a non-object ~ APPPATH/classes/controller/cconsultation.php [ 84 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2017-03-27 16:53:36 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
2017-03-27 16:53:36 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(570): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 570, Array)
#1 [internal function]: Controller_Cconsultation->action_getpatient()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:54:16 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
2017-03-27 16:54:16 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(570): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 570, Array)
#1 [internal function]: Controller_Cconsultation->action_getpatient()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 16:54:43 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
2017-03-27 16:54:43 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cconsultation.php [ 570 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(570): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 570, Array)
#1 [internal function]: Controller_Cconsultation->action_getpatient()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-03-27 17:54:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 17:54:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 17:54:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 17:54:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 17:54:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 17:54:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 17:54:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 17:54:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 17:54:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 17:54:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 17:56:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 17:56:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 17:56:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 17:56:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 17:56:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 17:56:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 17:56:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 17:56:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 17:56:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 17:56:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 18:28:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 18:28:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 18:29:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 18:29:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 18:29:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 18:29:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 18:29:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 18:29:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 18:38:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 18:38:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 18:38:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload-shim(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 18:38:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload-shim(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 18:38:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 18:38:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 18:38:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 18:38:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 18:38:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload-shim(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 18:38:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload-shim(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 18:38:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 18:38:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/lib/angular/angular-file-upload(.min).js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 20:21:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 20:21:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 20:21:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 20:21:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 21:20:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 21:20:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 22:02:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: ws/orders.json ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 22:02:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: ws/orders.json ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-03-27 23:26:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-03-27 23:26:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}