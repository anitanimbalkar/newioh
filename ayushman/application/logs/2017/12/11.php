<?php defined('SYSPATH') or die('No direct script access.'); ?>

2017-12-11 00:01:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 00:01:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 00:01:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 00:01:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 00:01:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 00:01:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 00:07:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 00:07:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 00:07:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 00:07:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 00:59:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 00:59:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 02:50:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 02:50:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 04:28:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 04:28:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 05:38:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 05:38:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 07:00:01 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
2017-12-11 07:00:01 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
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
2017-12-11 07:59:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 07:59:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 09:21:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 09:21:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 09:57:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 09:57:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 09:57:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 09:57:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 10:56:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 10:56:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 10:56:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/ ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 10:56:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/ ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:08:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:08:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:15:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:15:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:15:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:15:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:15:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:15:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:15:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:15:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:15:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:15:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:28:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:28:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:28:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:28:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:28:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:28:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:28:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:28:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:28:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:28:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:28:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:28:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:28:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:28:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:39:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:39:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:39:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:39:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:39:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:39:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:39:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:39:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 11:50:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 11:50:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:30:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:30:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:31:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:31:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:31:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:31:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:31:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:31:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:32:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:32:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:32:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:32:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:33:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:33:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:33:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:33:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:33:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:33:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:33:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:33:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:33:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:33:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:34:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:34:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:34:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:34:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:35:25 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL assets/images/smallLogo was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-12-11 12:35:25 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL assets/images/smallLogo was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-12-11 12:35:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:35:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:35:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:35:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:35:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:35:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:35:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:35:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:35:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:35:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:36:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:36:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:36:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:36:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:36:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:36:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:36:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:36:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:36:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:36:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:36:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:36:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:36:52 --- ERROR: Exception [ 0 ]: exception 'ErrorException' with message 'Trying to get property of non-object' in /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php:31
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php(31): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 31, Array)
#1 [internal function]: Controller_Cpatientdashboard->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cpatientdashboard.php [ 53 ]
2017-12-11 12:36:52 --- STRACE: Exception [ 0 ]: exception 'ErrorException' with message 'Trying to get property of non-object' in /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php:31
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientdashboard.php(31): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 31, Array)
#1 [internal function]: Controller_Cpatientdashboard->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cpatientdashboard.php [ 53 ]
--
#0 [internal function]: Controller_Cpatientdashboard->action_view()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientdashboard))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2017-12-11 12:37:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:37:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:37:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:37:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:37:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:37:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:37:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:37:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:37:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:37:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/glyphicons-halflings-regular.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:37:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:37:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:38:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:38:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:38:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:38:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:38:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:38:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:39:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:39:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:39:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:39:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:39:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:39:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:39:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:39:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:40:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:40:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:40:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:40:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:40:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:40:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:40:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:40:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:41:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:41:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 12:41:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 12:41:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 13:00:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 13:00:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 13:04:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 13:04:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 13:04:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 13:04:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 13:17:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 13:17:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 13:30:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 13:30:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 13:33:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 13:33:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 13:33:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 13:33:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 13:41:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 13:41:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:22:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:22:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:22:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:22:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:24:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:24:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:24:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:24:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:25:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:25:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:25:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:25:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:30:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:30:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:30:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:30:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:32:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:32:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/css/w3.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:32:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:32:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:42:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:42:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 14:42:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 14:42:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 15:59:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 15:59:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 16:54:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 16:54:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:01:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:01:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:21:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:21:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:22:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:22:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:24:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:24:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:24:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:24:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:24:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:24:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:24:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:24:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:24:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:24:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:24:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:24:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:24:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_217bc0_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:24:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_217bc0_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:30:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:30:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:30:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:30:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:30:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:30:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:30:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:30:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:56:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:56:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:56:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:56:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:56:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:56:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:56:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:56:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:56:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:56:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 18:56:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 18:56:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:11:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:11:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:11:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:11:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:11:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:11:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:11:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:11:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:12:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:12:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:13:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:13:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:13:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:13:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:16:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:16:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:16:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:16:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:16:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:16:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:16:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:16:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 19:17:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 19:17:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 20:29:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 20:29:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 22:12:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 22:12:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 22:19:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 22:19:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-11 23:14:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-11 23:14:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}