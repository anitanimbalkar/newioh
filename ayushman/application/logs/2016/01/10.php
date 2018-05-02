<?php defined('SYSPATH') or die('No direct script access.'); ?>

2016-01-10 00:01:01 --- ERROR: ErrorException [ 8 ]: Undefined variable: cronid ~ APPPATH/classes/controller/cscript.php [ 411 ]
2016-01-10 00:01:01 --- STRACE: ErrorException [ 8 ]: Undefined variable: cronid ~ APPPATH/classes/controller/cscript.php [ 411 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cscript.php(411): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 411, Array)
#1 [internal function]: Controller_Cscript->action_deductperiodiccharges()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cscript))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2016-01-10 00:05:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 00:05:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 00:43:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 00:43:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 01:29:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 01:29:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 02:10:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 02:10:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 02:22:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 02:22:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 02:22:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 02:22:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 02:22:54 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cregistration/registration was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2016-01-10 02:22:54 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cregistration/registration was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2016-01-10 02:31:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 02:31:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 04:01:04 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL bitrix/admin was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2016-01-10 04:01:04 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL bitrix/admin was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2016-01-10 04:01:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.php/admin ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 04:01:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.php/admin ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 06:15:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 06:15:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 08:34:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 08:34:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 08:53:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 08:53:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 10:18:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 10:18:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 10:40:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 10:40:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 11:16:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 11:16:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 12:54:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 12:54:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 13:57:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 13:57:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 13:57:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 13:57:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 13:57:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 13:57:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 14:00:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 14:00:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 14:00:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 14:00:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 14:01:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 14:01:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 14:50:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 14:50:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 14:50:39 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL home/Terms was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2016-01-10 14:50:39 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL home/Terms was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2016-01-10 14:50:39 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL home/Privacy was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2016-01-10 14:50:39 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL home/Privacy was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2016-01-10 14:50:39 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL home/Return was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2016-01-10 14:50:39 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL home/Return was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2016-01-10 15:26:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:26:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:26:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:26:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:26:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sitemap.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:26:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sitemap.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:27:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sitemap.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:27:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sitemap.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:27:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Board of Advisors.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:27:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Board of Advisors.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:27:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Disclaimer.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:27:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Disclaimer.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:27:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Founders.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:27:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Founders.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:27:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Mission.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:27:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Mission.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:28:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Privacy Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:28:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Privacy Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:28:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Return Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:28:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Return Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:28:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:28:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:29:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Company.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:29:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Company.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:29:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Consumers.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:29:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Consumers.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:29:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Contactus.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:29:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Contactus.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:29:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Doctors.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:29:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Doctors.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:29:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Faq.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:29:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Faq.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:29:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Feedback.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:29:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Feedback.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:29:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/HowitWorks.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:29:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/HowitWorks.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:29:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/ServiceProviders.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:29:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/ServiceProviders.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:29:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use1.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:29:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use1.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:30:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use2.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:30:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use2.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:30:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Thanku.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:30:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Thanku.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:30:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:30:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 15:40:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 15:40:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 16:08:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 16:08:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 18:42:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 18:42:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 18:43:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 18:43:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 18:46:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 18:46:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 18:46:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 18:46:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 18:49:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 18:49:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 18:53:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 18:53:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 18:57:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 18:57:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 18:57:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 18:57:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 19:18:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 19:18:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 19:21:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 19:21:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 19:24:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 19:24:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 19:24:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 19:24:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 19:34:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 19:34:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 19:35:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 19:35:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 19:35:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 19:35:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 19:36:00 --- ERROR: Exception [ 0 ]: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`ayushmanlivedb`.`appointments`, CONSTRAINT `refincidentid_c` FOREIGN KEY (`refincidentid_c`) REFERENCES `incidents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION) [ INSERT INTO `appointments` (`refappfromid_c`, `refappwithid_c`, `scheduledstarttime_c`, `scheduledendtime_c`, `displaytime_c`, `refincidentid_c`, `reasonsymptom_c`, `refmode_c`, `clinicid_c`, `consultationmode_c`, `rate_c`, `refappointmentstatusesid_c`, `status_c`, `paid_c`, `usagecharges_c`, `appointmenttype_c`, `createdon_c`, `createdby_c`) VALUES ('18809', '383', '2016-01-16 19:00:00', '2016-01-16 19:01:00', '2016-01-16 19:00', '', '', 3, '7243', 'In-clinic', '200.00', 2, 'fromsystem', '0', 0.000000, 'S', '2016-01-10 7:36:00 pm', '18809') ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cappointment.php [ 306 ]
2016-01-10 19:36:00 --- STRACE: Exception [ 0 ]: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`ayushmanlivedb`.`appointments`, CONSTRAINT `refincidentid_c` FOREIGN KEY (`refincidentid_c`) REFERENCES `incidents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION) [ INSERT INTO `appointments` (`refappfromid_c`, `refappwithid_c`, `scheduledstarttime_c`, `scheduledendtime_c`, `displaytime_c`, `refincidentid_c`, `reasonsymptom_c`, `refmode_c`, `clinicid_c`, `consultationmode_c`, `rate_c`, `refappointmentstatusesid_c`, `status_c`, `paid_c`, `usagecharges_c`, `appointmenttype_c`, `createdon_c`, `createdby_c`) VALUES ('18809', '383', '2016-01-16 19:00:00', '2016-01-16 19:01:00', '2016-01-16 19:00', '', '', 3, '7243', 'In-clinic', '200.00', 2, 'fromsystem', '0', 0.000000, 'S', '2016-01-10 7:36:00 pm', '18809') ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cappointment.php [ 306 ]
--
#0 [internal function]: Controller_Cappointment->action_book()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cappointment))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-01-10 19:36:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatientprofile/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 19:36:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatientprofile/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-01-10 19:43:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-01-10 19:43:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}