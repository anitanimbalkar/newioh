<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-12-10 00:01:01 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 00:01:01 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 00:39:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/btn-close.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:39:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/btn-close.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:42:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:42:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:42:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:42:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:42:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:42:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:42:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:42:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:43:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:43:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:43:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:43:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:43:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:43:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:43:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:43:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:43:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:43:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:43:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:43:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:44:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:44:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:44:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:44:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:45:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Disclaimer.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:45:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Disclaimer.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:45:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:45:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:45:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:45:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:45:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:45:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:45:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:45:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:54:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:54:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/Close_icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 00:54:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 00:54:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/photoGallery.gif ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 01:08:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 01:08:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 01:08:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Return Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 01:08:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Return Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 01:38:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Thanku.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 01:38:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Thanku.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 02:18:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 02:18:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 03:29:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 03:29:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 03:29:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Faq.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 03:29:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Faq.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 06:09:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 06:09:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 07:18:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 07:18:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 07:23:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 07:23:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 07:51:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 07:51:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 07:51:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 07:51:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 09:13:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 09:13:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 09:18:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 09:18:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 09:31:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Mission.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 09:31:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Mission.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 10:03:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 10:03:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 11:59:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 11:59:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 11:59:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 11:59:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:00:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:00:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:05:02 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 12:05:02 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 12:08:11 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 12:08:11 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 12:12:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:12:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:13:51 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 12:13:51 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 12:13:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:13:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:14:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:14:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:21:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:21:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:25:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:25:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:34:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:34:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:34:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:34:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:47:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/9249_03122013134402.JPG ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:47:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/9249_03122013134402.JPG ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:49:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:49:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 12:50:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 12:50:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:00:38 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 13:00:38 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 13:30:23 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 13:30:23 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 13:42:15 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 13:42:15 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 13:49:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:49:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:49:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:49:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:51:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:51:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:51:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:51:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:52:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:52:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:53:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:53:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:54:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:54:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:54:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:54:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:54:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:54:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:54:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:54:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:54:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:54:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:57:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:57:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:57:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:57:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:57:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:57:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:57:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:57:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:57:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:57:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:58:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:58:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:58:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:58:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:58:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:58:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:59:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:59:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:59:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:59:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:59:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:59:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:59:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:59:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 13:59:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 13:59:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:00:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:00:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:00:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:00:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:00:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:00:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:05:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:05:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:06:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:06:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:06:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:06:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:06:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:06:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:07:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:07:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:07:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:07:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:19:32 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 14:19:32 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 14:27:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:27:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:36:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:36:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:36:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:36:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:37:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:37:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:37:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:37:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:39:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:39:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 14:40:03 --- ERROR: ErrorException [ 8 ]: Undefined index: SERVER_NAME ~ SYSPATH/classes/kohana/url.php [ 79 ]
2015-12-10 14:40:03 --- STRACE: ErrorException [ 8 ]: Undefined index: SERVER_NAME ~ SYSPATH/classes/kohana/url.php [ 79 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/url.php(79): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 79, Array)
#1 /var/www/html/ayushman/system/classes/kohana/url.php(112): Kohana_URL::base('http', 'index.php')
#2 /var/www/html/ayushman/system/classes/kohana/request.php(942): Kohana_URL::site('/', 'http', 'index.php')
#3 /var/www/html/ayushman/application/classes/controller/cwelcome.php(9): Kohana_Request->redirect('/home/index.sht...')
#4 [internal function]: Controller_Cwelcome->action_index()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2015-12-10 14:40:41 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 14:40:41 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 14:41:18 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '), 'No show appointment', 'SUCCESS', ' ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-12-10 14:41:18 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '), 'No show appointment', 'SUCCESS', ' ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(2, 'INSERT INTO `lo...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(1222): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(1314): Kohana_ORM->create(NULL)
#3 /var/www/html/ayushman/application/classes/kohana/ayushmanorm.php(143): Kohana_ORM->save()
#4 /var/www/html/ayushman/application/classes/helper/cron.php(83): kohana_Ayushmanorm->save()
#5 /var/www/html/ayushman/application/classes/controller/crefundprocess.php(155): helper_cron->writelog(Array, 'SUCCESS', '<a target='_bla...', 'No show appoint...', 'Clear No show a...')
#6 [internal function]: Controller_Crefundprocess->action_appointmentrefund()
#7 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Crefundprocess))
#8 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#11 {main}
2015-12-10 14:42:20 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 14:42:20 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 14:42:31 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 14:42:31 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 14:42:44 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 14:42:44 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 14:44:37 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 14:44:37 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 14:44:43 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 14:44:43 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 14:44:58 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 14:44:58 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 14:57:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 14:57:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 15:16:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 15:16:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 15:26:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 15:26:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 15:38:04 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 15:38:04 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 15:38:10 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 15:38:10 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 15:39:52 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 15:39:52 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 15:40:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 15:40:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 15:46:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 15:46:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 16:00:36 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 16:00:36 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 16:03:36 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 16:03:36 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 16:06:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 16:06:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 16:28:44 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
2015-12-10 16:28:44 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory ~ APPPATH/classes/helper/export.php [ 3 ]
--
#0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-12-10 17:32:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 17:32:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 17:32:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 17:32:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 17:33:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 17:33:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 17:34:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 17:34:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 17:43:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 17:43:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 17:43:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 17:43:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/img/disk.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 18:13:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 18:13:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 18:13:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Thanku.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 18:13:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Thanku.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 18:28:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 18:28:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 18:33:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 18:33:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 18:33:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 18:33:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 18:33:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 18:33:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 18:33:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 18:33:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 18:58:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 18:58:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 19:08:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 19:08:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 19:21:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 19:21:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 20:31:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 20:31:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 20:31:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 20:31:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 20:31:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 20:31:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon-precomposed.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 20:31:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 20:31:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: apple-touch-icon.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 20:45:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 20:45:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 20:56:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 20:56:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 20:57:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 20:57:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 20:57:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 20:57:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 20:57:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 20:57:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 20:57:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 20:57:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 21:08:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 21:08:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 21:08:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 21:08:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 22:01:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 22:01:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 22:02:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 22:02:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 22:02:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Privacy Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 22:02:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Privacy Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-12-10 23:43:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Return Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2015-12-10 23:43:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Return Policy.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}