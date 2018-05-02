<?php defined('SYSPATH') or die('No direct script access.'); ?>

2016-09-06 00:14:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 00:14:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 00:45:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 00:45:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 01:00:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 01:00:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 01:36:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 01:36:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 02:01:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 02:01:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 02:01:30 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL apple-app-site-association was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2016-09-06 02:01:30 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL apple-app-site-association was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2016-09-06 03:00:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 03:00:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 03:00:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 03:00:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 04:36:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 04:36:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 06:53:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 06:53:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 09:57:53 --- ERROR: ErrorException [ 8 ]: Undefined index: key ~ APPPATH/classes/controller/cregistrar.php [ 554 ]
2016-09-06 09:57:53 --- STRACE: ErrorException [ 8 ]: Undefined index: key ~ APPPATH/classes/controller/cregistrar.php [ 554 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cregistrar.php(554): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 554, Array)
#1 [internal function]: Controller_Cregistrar->action_completeregistration()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cregistrar))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2016-09-06 10:05:25 --- ERROR: ErrorException [ 8 ]: Undefined index: key ~ APPPATH/classes/controller/cregistrar.php [ 554 ]
2016-09-06 10:05:25 --- STRACE: ErrorException [ 8 ]: Undefined index: key ~ APPPATH/classes/controller/cregistrar.php [ 554 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cregistrar.php(554): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 554, Array)
#1 [internal function]: Controller_Cregistrar->action_completeregistration()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cregistrar))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2016-09-06 10:41:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 10:41:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 10:41:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 10:41:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 11:03:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 11:03:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 11:48:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 11:48:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:06:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/fonts/glyphicons-halflings-regular.eot ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:06:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/fonts/glyphicons-halflings-regular.eot ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:45:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:45:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:46:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:46:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:51:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:51:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:53:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:53:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:56:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:56:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:56:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:56:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:56:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:56:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:57:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_65_ffffff_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:57:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_65_ffffff_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:57:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_100_fdf5ce_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:57:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_100_fdf5ce_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:57:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:57:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 12:57:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 12:57:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:01:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:01:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:01:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:01:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:03:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_100_fdf5ce_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:03:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_100_fdf5ce_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:03:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/images/bullet.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:03:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/images/bullet.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:03:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:03:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:03:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/images/bullet.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:03:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/images/bullet.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:04:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:04:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:04:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:04:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:04:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:04:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:05:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:05:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:05:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:05:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:08:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:08:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:08:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_65_ffffff_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:08:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_65_ffffff_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:08:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_100_fdf5ce_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:08:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_100_fdf5ce_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:08:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:08:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:09:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:09:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:12:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:12:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:12:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:12:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:13:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:13:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:13:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/images/bullet.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:13:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/images/bullet.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:15:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:15:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:16:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:16:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:16:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:16:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:18:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:18:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:18:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:18:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:23:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_65_ffffff_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:23:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_65_ffffff_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:26:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:26:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:29:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:29:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:29:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/images/bullet.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:29:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cdoctorclinic/images/bullet.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:30:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:30:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:30:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:30:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 13:34:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 13:34:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 14:04:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 14:04:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 14:31:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 14:31:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 15:08:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 15:08:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 16:02:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 16:02:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 16:03:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 16:03:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 16:10:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 16:10:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 16:16:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorydisplay/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 16:16:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorydisplay/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 16:16:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorydisplay/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 16:16:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorydisplay/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 16:30:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 16:30:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 16:33:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 16:33:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 16:42:00 --- ERROR: ErrorException [ 8 ]: Undefined index: testname ~ APPPATH/classes/controller/upload.php [ 1136 ]
2016-09-06 16:42:00 --- STRACE: ErrorException [ 8 ]: Undefined index: testname ~ APPPATH/classes/controller/upload.php [ 1136 ]
--
#0 /var/www/html/ayushman/application/classes/controller/upload.php(1136): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 1136, Array)
#1 [internal function]: Controller_Upload->action_savereports()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Upload))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2016-09-06 16:42:01 --- ERROR: ErrorException [ 8 ]: Undefined index: testname ~ APPPATH/classes/controller/upload.php [ 1136 ]
2016-09-06 16:42:01 --- STRACE: ErrorException [ 8 ]: Undefined index: testname ~ APPPATH/classes/controller/upload.php [ 1136 ]
--
#0 /var/www/html/ayushman/application/classes/controller/upload.php(1136): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 1136, Array)
#1 [internal function]: Controller_Upload->action_savereports()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Upload))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2016-09-06 16:42:48 --- ERROR: ErrorException [ 8 ]: Undefined index: params ~ APPPATH/classes/controller/upload.php [ 1031 ]
2016-09-06 16:42:48 --- STRACE: ErrorException [ 8 ]: Undefined index: params ~ APPPATH/classes/controller/upload.php [ 1031 ]
--
#0 /var/www/html/ayushman/application/classes/controller/upload.php(1031): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 1031, Array)
#1 [internal function]: Controller_Upload->action_savereports()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Upload))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2016-09-06 18:52:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 18:52:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 19:22:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 19:22:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 19:39:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 19:39:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 20:26:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 20:26:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 21:11:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 21:11:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 21:49:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 21:49:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 22:03:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: ws/orders.json ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 22:03:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: ws/orders.json ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 22:10:38 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL apple-app-site-association was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2016-09-06 22:10:38 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL apple-app-site-association was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2016-09-06 23:03:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 23:03:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-09-06 23:39:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-09-06 23:39:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}