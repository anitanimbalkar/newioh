<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-01-27 00:01:01 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2015-01-27 00:01:01 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-01-27 00:01:01 --- ERROR: Undefined variable: plugin
2015-01-27 00:01:01 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
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
2015-01-27 00:01:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:01:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:04:07 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 00:04:07 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 00:04:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:04:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:05:27 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 00:05:27 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:05:27 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:05:27 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:06:13 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 00:06:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:06:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:06:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:06:45 --- ERROR: Unable to find a route to match the URI: assets/js/angular-file-upload-shim.min.js
2015-01-27 00:06:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:06:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:06:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:06:45 --- ERROR: Unable to find a route to match the URI: assets/js/FileAPI.flash.swf
2015-01-27 00:06:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:06:45 --- ERROR: Unable to find a route to match the URI: assets/js/FileAPI.min.js
2015-01-27 00:06:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:06:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:06:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:06:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:06:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:06:48 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 00:06:48 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:06:48 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:06:48 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:08:06 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 00:08:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:08:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:08:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:12:35 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 00:12:35 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:12:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:12:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:13:02 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 00:13:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:13:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:13:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:13:13 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 00:13:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:13:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:13:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 00:13:37 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 00:13:37 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 00:13:37 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 00:13:37 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 04:29:34 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 04:29:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 04:29:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 04:29:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 05:18:25 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 05:18:25 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 05:18:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 05:18:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 06:35:49 --- ERROR: Unable to find a route to match the URI: pjhwkkloeamtjdw.html
2015-01-27 06:35:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 06:35:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 06:35:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 07:28:00 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 07:28:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 07:28:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 07:28:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 07:33:36 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 07:33:36 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 07:33:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 07:33:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 09:52:36 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 09:52:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 09:52:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 09:52:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 09:59:39 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 09:59:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 09:59:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 09:59:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 09:59:56 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 09:59:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 09:59:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 09:59:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 10:20:01 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 10:20:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 10:20:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 10:20:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 10:47:55 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 10:47:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 10:47:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 10:47:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 10:49:22 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 10:49:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 10:49:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 10:49:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 10:51:02 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 10:51:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 10:51:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 10:51:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:03:01 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2015-01-27 11:03:01 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-01-27 11:03:01 --- ERROR: Undefined variable: plugin
2015-01-27 11:03:01 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
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
2015-01-27 11:03:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:03:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:03:19 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 11:03:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:03:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:03:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:07:07 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 11:07:07 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:07:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:07:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:10:49 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 11:10:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:10:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:10:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:22:48 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 11:22:48 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:22:48 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:22:48 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:22:49 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 11:22:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:22:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:22:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:22:50 --- ERROR: Unable to find a route to match the URI: pjhwkkloeamtjdw.html
2015-01-27 11:22:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:22:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:22:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:46:24 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 11:46:24 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 11:46:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:46:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:46:33 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 11:46:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:46:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:46:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:46:33 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2015-01-27 11:46:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:46:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:46:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:49:29 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-01-27 11:49:29 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:49:29 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:49:29 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:49:30 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 11:49:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:49:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:49:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:50:28 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png
2015-01-27 11:50:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:50:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:50:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:50:28 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png
2015-01-27 11:50:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:50:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:50:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:50:28 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png
2015-01-27 11:50:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:50:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:50:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:50:32 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-01-27 11:50:32 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:50:32 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:50:32 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:51:28 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 11:51:28 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 11:51:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:51:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:55:17 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 11:55:17 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 11:55:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:55:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:56:08 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 11:56:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:56:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:56:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:57:43 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-01-27 11:57:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:57:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:57:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:59:17 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 11:59:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:59:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:59:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 11:59:17 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2015-01-27 11:59:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 11:59:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 11:59:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:01:04 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 12:01:04 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:01:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:01:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:01:05 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 12:01:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:01:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:01:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:01:55 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-01-27 12:01:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:01:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:01:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:01:56 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 12:01:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:01:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:01:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:03:10 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png
2015-01-27 12:03:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:03:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:03:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:03:10 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png
2015-01-27 12:03:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:03:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:03:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:03:10 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png
2015-01-27 12:03:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:03:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:03:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:03:11 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-01-27 12:03:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:03:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:03:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:10:27 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-01-27 12:10:27 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:10:27 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:10:27 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:12:24 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 12:12:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:12:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:12:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:12:24 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2015-01-27 12:12:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:12:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:12:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:12:35 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 12:12:35 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 12:12:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:12:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:12:47 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 12:12:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:12:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:12:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:17:42 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 12:17:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:17:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:17:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:17:46 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 12:17:46 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 12:17:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:17:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:19:02 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 12:19:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:19:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:19:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:19:06 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 12:19:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:19:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:19:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:19:15 --- ERROR: The requested URL home was not found on this server.
2015-01-27 12:19:15 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 12:19:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:19:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:19:17 --- ERROR: The requested URL cpasswordmanager/displayverifyuserform was not found on this server.
2015-01-27 12:19:17 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 12:19:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:19:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:31:24 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 12:31:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:31:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:31:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 12:43:32 --- ERROR: Unable to find a route to match the URI: cpasswordmanager/Thanku.html
2015-01-27 12:43:32 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 12:43:32 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 12:43:32 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 13:01:01 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 13:01:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 13:01:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 13:01:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:46:18 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 14:46:18 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 14:46:18 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 14:46:18 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 14:46:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:46:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:46:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:46:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:48:10 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 14:48:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:48:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:48:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:50:04 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 14:50:04 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:50:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:50:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:50:43 --- ERROR: Unknown column 'Action' in 'order clause' [ SELECT `upcomingappointment`.* FROM `upcomingappointments` AS `upcomingappointment` WHERE `Appointmentstatus` = 'schedule' AND `userid` = '13913' ORDER BY `Action` ASC LIMIT 15 OFFSET 0 ]
2015-01-27 14:50:43 --- ERROR: #0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `upcomin...', 'Model_Upcominga...', Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(963): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(922): Kohana_ORM->_load_result(true)
#3 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(203): Kohana_ORM->find_all()
#4 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(29): Model_Xjqgridgetdata->getdatafrmdb('find_all', Object(Model_Upcomingappointment), '[Appointmentsta...', '', 'Action', 'asc', 0, '15')
#5 /var/www/html/ayushman/application/classes/controller/xjqgriddatagenerator.php(19): Model_Xjqgridgetdata->getdata('1', '15', 'Action', 'asc', 'upcomingappoint...', 'id,userid,refap...', '[Appointmentsta...', '')
#6 [internal function]: Controller_Xjqgriddatagenerator->action_generate()
#7 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Xjqgriddatagenerator))
#8 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#11 {main}
2015-01-27 14:50:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:50:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:50:47 --- ERROR: Unknown column 'Action' in 'order clause' [ SELECT `upcomingappointment`.* FROM `upcomingappointments` AS `upcomingappointment` WHERE `Appointmentstatus` = 'schedule' AND `userid` = '13913' ORDER BY `Action` ASC LIMIT 30 OFFSET 0 ]
2015-01-27 14:50:47 --- ERROR: #0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `upcomin...', 'Model_Upcominga...', Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(963): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(922): Kohana_ORM->_load_result(true)
#3 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(203): Kohana_ORM->find_all()
#4 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(29): Model_Xjqgridgetdata->getdatafrmdb('find_all', Object(Model_Upcomingappointment), '[Appointmentsta...', '', 'Action', 'asc', 0, '30')
#5 /var/www/html/ayushman/application/classes/controller/xjqgriddatagenerator.php(19): Model_Xjqgridgetdata->getdata('1', '30', 'Action', 'asc', 'upcomingappoint...', 'id,userid,refap...', '[Appointmentsta...', '')
#6 [internal function]: Controller_Xjqgriddatagenerator->action_generate()
#7 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Xjqgriddatagenerator))
#8 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#11 {main}
2015-01-27 14:50:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:50:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:50:49 --- ERROR: Unknown column 'Action' in 'order clause' [ SELECT `upcomingappointment`.* FROM `upcomingappointments` AS `upcomingappointment` WHERE `Appointmentstatus` = 'schedule' AND `userid` = '13913' ORDER BY `Action` ASC LIMIT 15 OFFSET 0 ]
2015-01-27 14:50:49 --- ERROR: #0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `upcomin...', 'Model_Upcominga...', Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(963): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(922): Kohana_ORM->_load_result(true)
#3 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(203): Kohana_ORM->find_all()
#4 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(29): Model_Xjqgridgetdata->getdatafrmdb('find_all', Object(Model_Upcomingappointment), '[Appointmentsta...', '', 'Action', 'asc', 0, '15')
#5 /var/www/html/ayushman/application/classes/controller/xjqgriddatagenerator.php(19): Model_Xjqgridgetdata->getdata('1', '15', 'Action', 'asc', 'upcomingappoint...', 'id,userid,refap...', '[Appointmentsta...', '')
#6 [internal function]: Controller_Xjqgriddatagenerator->action_generate()
#7 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Xjqgriddatagenerator))
#8 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#11 {main}
2015-01-27 14:50:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:50:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:51:13 --- ERROR: Unable to find a route to match the URI: cpatientprofile/deps.js
2015-01-27 14:51:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:51:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:51:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:51:41 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 14:51:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:51:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:51:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:53:14 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 14:53:14 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:53:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:53:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:53:15 --- ERROR: Unable to find a route to match the URI: cpatienthistorydisplay/{{patientinfo.PatientPhoto}}
2015-01-27 14:53:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:53:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:53:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:55:40 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 14:55:40 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:55:40 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:55:40 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:55:42 --- ERROR: Unable to find a route to match the URI: assets/js/angular-file-upload-shim.min.js
2015-01-27 14:55:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:55:42 --- ERROR: Unable to find a route to match the URI: assets/js/FileAPI.min.js
2015-01-27 14:55:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:55:42 --- ERROR: Unable to find a route to match the URI: assets/js/FileAPI.flash.swf
2015-01-27 14:55:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:55:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:55:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:55:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:55:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:55:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:55:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:55:47 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 14:55:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:55:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:55:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:55:59 --- ERROR: Unable to find a route to match the URI: assets/js/angular-file-upload-shim.min.js
2015-01-27 14:55:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:55:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:55:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:55:59 --- ERROR: Unable to find a route to match the URI: assets/js/FileAPI.min.js
2015-01-27 14:55:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:55:59 --- ERROR: Unable to find a route to match the URI: assets/js/FileAPI.flash.swf
2015-01-27 14:55:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:55:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:55:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:55:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:55:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:56:01 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 14:56:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:56:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:56:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:57:05 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 14:57:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:57:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:57:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 14:57:13 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 14:57:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 14:57:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 14:57:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:00:27 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 15:00:27 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:00:27 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:00:27 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:00:39 --- ERROR: Unable to find a route to match the URI: assets/js/angular-file-upload-shim.min.js
2015-01-27 15:00:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:00:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:00:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:00:39 --- ERROR: Unable to find a route to match the URI: assets/js/FileAPI.min.js
2015-01-27 15:00:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:00:39 --- ERROR: Unable to find a route to match the URI: assets/js/FileAPI.flash.swf
2015-01-27 15:00:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:00:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:00:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:00:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:00:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:00:40 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 15:00:40 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:00:40 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:00:40 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:00:50 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 15:00:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:00:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:00:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:02:46 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 15:02:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:02:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:02:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:02:49 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 15:02:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:02:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:02:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:05:10 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 15:05:10 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 15:05:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:05:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:05:15 --- ERROR: Unable to find a route to match the URI: apple-touch-icon-precomposed.png
2015-01-27 15:05:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:05:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:05:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:05:15 --- ERROR: Unable to find a route to match the URI: apple-touch-icon.png
2015-01-27 15:05:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:05:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:05:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 15:21:40 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 15:21:40 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 15:21:40 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 15:21:40 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 16:39:09 --- ERROR: Unable to find a route to match the URI: ServiceProviders.shtml
2015-01-27 16:39:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 16:39:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 16:39:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 16:45:46 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 16:45:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 16:45:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 16:45:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 16:57:30 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 16:57:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 16:57:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 16:57:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 16:57:30 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 16:57:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 16:57:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 16:57:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 17:38:53 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 17:38:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 17:38:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 17:38:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 17:40:12 --- ERROR: Unable to find a route to match the URI: home/Terms of Use3.html
2015-01-27 17:40:12 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 17:40:12 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 17:40:12 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 17:40:24 --- ERROR: Unable to find a route to match the URI: chelper/Thanku.html
2015-01-27 17:40:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 17:40:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 17:40:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 17:40:49 --- ERROR: Unable to find a route to match the URI: cregistrar/Thanku.html
2015-01-27 17:40:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 17:40:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 17:40:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 17:40:53 --- ERROR: The requested URL cpasswordmanager/displayverifyuserform was not found on this server.
2015-01-27 17:40:53 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 17:40:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 17:40:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 17:40:56 --- ERROR: Unable to find a route to match the URI: cpasswordmanager/Thanku.html
2015-01-27 17:40:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 17:40:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 17:40:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 17:42:39 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 17:42:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 17:42:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 17:42:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 17:58:54 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 17:58:54 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 17:58:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 17:58:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 17:59:20 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2015-01-27 17:59:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 17:59:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 17:59:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 17:59:21 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 17:59:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 17:59:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 17:59:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:01:09 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-01-27 18:01:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:01:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:01:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:01:09 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:01:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:01:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:01:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:01:49 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png
2015-01-27 18:01:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:01:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:01:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:01:49 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png
2015-01-27 18:01:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:01:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:01:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:01:49 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png
2015-01-27 18:01:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:01:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:01:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:01:50 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-01-27 18:01:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:01:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:01:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:06:10 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-01-27 18:06:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:06:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:06:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:07:22 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:07:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:07:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:07:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:07:22 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2015-01-27 18:07:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:07:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:07:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:07:38 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 18:07:38 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 18:07:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:07:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:11:43 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 18:11:43 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 18:11:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:11:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:13:19 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:13:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:13:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:13:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:14:06 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:14:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:14:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:14:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:14:19 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:14:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:14:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:14:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:14:58 --- ERROR: Unable to find a route to match the URI: assets/js/angular-file-upload-shim.min.js
2015-01-27 18:14:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:14:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:14:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:14:58 --- ERROR: Unable to find a route to match the URI: assets/js/FileAPI.flash.swf
2015-01-27 18:14:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:14:58 --- ERROR: Unable to find a route to match the URI: assets/js/FileAPI.min.js
2015-01-27 18:14:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:14:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:14:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:14:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:14:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:15:02 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:15:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:15:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:15:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:15:08 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:15:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:15:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:15:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:17:06 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:17:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:17:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:17:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:17:08 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:17:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:17:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:17:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:36:35 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 18:36:35 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 18:36:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:36:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:36:59 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:36:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:36:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:36:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:36:59 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2015-01-27 18:36:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:36:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:36:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:37:15 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-01-27 18:37:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:37:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:37:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:37:15 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:37:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:37:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:37:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:39:52 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png
2015-01-27 18:39:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:39:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:39:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:39:52 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png
2015-01-27 18:39:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:39:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:39:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:39:52 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png
2015-01-27 18:39:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:39:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:39:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:39:53 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-01-27 18:39:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:39:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:39:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:45:00 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-01-27 18:45:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:45:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:45:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:45:56 --- ERROR: Unable to find a route to match the URI: favicon.ico
2015-01-27 18:45:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:45:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:45:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:45:57 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2015-01-27 18:45:57 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 18:45:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:45:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 18:50:56 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 18:50:56 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 18:50:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 18:50:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 19:22:53 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 19:22:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 19:22:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 19:22:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 19:22:55 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 19:22:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 19:22:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 19:22:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 21:01:08 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-01-27 21:01:08 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-01-27 21:01:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 21:01:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 23:49:51 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-01-27 23:49:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 23:49:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 23:49:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-01-27 23:49:57 --- ERROR: Unable to find a route to match the URI: chelper/Thanku.html
2015-01-27 23:49:57 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-01-27 23:49:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:150
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(150): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 150, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-01-27 23:49:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}