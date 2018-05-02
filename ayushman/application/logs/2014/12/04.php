<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-12-04 00:01:01 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2014-12-04 00:01:01 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2014-12-04 00:01:01 --- ERROR: Undefined variable: plugin
2014-12-04 00:01:01 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
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
2014-12-04 00:01:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 00:01:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 01:50:39 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-04 01:50:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 01:50:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 01:50:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 04:25:28 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-04 04:25:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 04:25:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 04:25:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 04:52:01 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-04 04:52:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 04:52:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 04:52:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 05:27:10 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-04 05:27:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 05:27:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 05:27:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 06:18:17 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-04 06:18:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 06:18:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 06:18:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 06:40:18 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-04 06:40:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 06:40:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 06:40:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 07:43:54 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-04 07:43:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 07:43:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 07:43:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 08:38:11 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 08:38:11 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 08:38:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 08:38:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 09:37:41 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 09:37:41 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 09:37:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 09:37:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 10:20:17 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 10:20:17 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 10:20:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 10:20:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 10:20:17 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 10:20:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 10:20:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 10:20:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 10:20:18 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 10:20:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 10:20:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 10:20:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 10:20:50 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 10:20:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 10:20:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 10:20:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 10:20:50 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 10:20:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 10:20:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 10:20:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 10:21:46 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 10:21:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 10:21:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 10:21:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 10:21:46 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 10:21:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 10:21:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 10:21:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 10:59:31 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 10:59:31 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 10:59:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 10:59:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 11:03:01 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2014-12-04 11:03:01 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2014-12-04 11:03:01 --- ERROR: Undefined variable: plugin
2014-12-04 11:03:01 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
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
2014-12-04 11:03:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 11:03:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 11:48:09 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-04 11:48:09 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 11:48:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 11:48:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:08:51 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-04 12:08:51 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 12:08:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:08:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:09:29 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 12:09:29 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:09:29 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:09:29 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:23:49 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 12:23:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:23:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:23:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:23:50 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 12:23:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:23:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:23:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:23:52 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 12:23:52 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 12:23:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:23:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:23:59 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:23:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:23:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:23:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:24:13 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 12:24:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:24:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:24:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:24:13 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 12:24:13 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 12:24:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:24:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:24:18 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:24:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:24:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:24:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:24:24 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:24:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:24:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:24:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:24:24 --- ERROR: Unable to find a route to match the URI: cpatienthistorydisplay/{{patientinfo.PatientPhoto}}
2014-12-04 12:24:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:24:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:24:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:24:41 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:24:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:24:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:24:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:24:41 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:24:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:24:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:24:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:25:05 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:25:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:25:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:25:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:25:05 --- ERROR: Unable to find a route to match the URI: cpatienthistorydisplay/{{patientinfo.PatientPhoto}}
2014-12-04 12:25:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:25:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:25:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:25:19 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:25:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:25:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:25:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:25:27 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:25:27 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:25:27 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:25:27 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:25:38 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:25:38 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:25:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:25:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:25:38 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:25:38 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:25:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:25:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:28:04 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:28:04 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:28:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:28:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:29:47 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:29:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:29:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:29:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:30:03 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:30:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:30:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:30:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:30:03 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:30:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:30:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:30:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:30:09 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png
2014-12-04 12:30:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:30:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:30:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:30:09 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:30:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:30:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:30:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:30:14 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 12:30:14 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:30:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:30:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 12:32:14 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 12:32:14 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 12:32:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 12:32:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:13:45 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 13:13:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:13:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:13:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:13:45 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 13:13:45 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 13:13:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:13:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:14:04 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 13:14:04 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 13:14:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:14:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:14:07 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 13:14:07 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:14:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:14:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:14:08 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 13:14:08 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 13:14:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:14:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:14:08 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 13:14:08 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 13:14:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:14:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:14:08 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 13:14:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:14:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:14:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:14:10 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 13:14:10 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 13:14:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:14:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:14:17 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 13:14:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:14:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:14:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:14:34 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 13:14:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:14:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:14:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:14:47 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:14:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:14:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:14:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:14:51 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 13:14:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:14:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:14:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:15:06 --- ERROR: Unable to find a route to match the URI: cpatientprofile/deps.js
2014-12-04 13:15:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:15:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:15:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:15:08 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:15:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:15:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:15:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:15:25 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:15:25 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:15:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:15:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:15:42 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:15:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:15:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:15:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:15:53 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:15:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:15:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:15:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:16:00 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png
2014-12-04 13:16:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:16:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:16:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:16:01 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:16:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:16:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:16:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:16:35 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:16:35 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:16:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:16:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:16:39 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:16:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:16:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:16:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:16:58 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2014-12-04 13:16:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:16:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:16:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:17:20 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:17:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:17:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:17:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:17:43 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:17:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:17:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:17:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:17:53 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:17:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:17:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:17:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:18:02 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:18:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:18:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:18:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:18:14 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:18:14 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:18:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:18:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:18:46 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:18:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:18:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:18:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:18:47 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:18:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:18:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:18:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:19:22 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:19:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:19:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:19:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:19:23 --- ERROR: Unable to find a route to match the URI: cpatienthistorydisplay/{{patientinfo.PatientPhoto}}
2014-12-04 13:19:23 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:19:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:19:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:21:27 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:21:27 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:21:27 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:21:27 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:22:28 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:22:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:22:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:22:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:22:29 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:22:29 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:22:29 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:22:29 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:22:35 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 13:22:35 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:22:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:22:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:22:35 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 13:22:35 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 13:22:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:22:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:23:49 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2014-12-04 13:23:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:23:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:23:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:23:52 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:23:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:23:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:23:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:28:32 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:28:32 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:28:32 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:28:32 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:29:00 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2014-12-04 13:29:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:29:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:29:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:29:00 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:29:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:29:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:29:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:29:01 --- ERROR: HTTP_Exception_400 [ 400 ]:  ~ APPPATH/classes/controller/cpatienthistory.php [ 795 ]
2014-12-04 13:29:01 --- ERROR: #0 [internal function]: Controller_Cpatienthistory->action_reports()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatienthistory))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2014-12-04 13:29:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:29:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:29:01 --- ERROR: Undefined variable: appointments
2014-12-04 13:29:01 --- ERROR: #0 /var/www/html/ayushman/application/classes/controller/newcemrdashboard.php(325): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 325, Array)
#1 [internal function]: Controller_Newcemrdashboard->action_getPastAllData()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Newcemrdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2014-12-04 13:29:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:29:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:29:01 --- ERROR: HTTP_Exception_400 [ 400 ]:  ~ APPPATH/classes/controller/cpatienthistory.php [ 775 ]
2014-12-04 13:29:01 --- ERROR: #0 [internal function]: Controller_Cpatienthistory->action_appointments()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatienthistory))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2014-12-04 13:29:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:29:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:29:01 --- ERROR: exception 'ErrorException' with message 'Undefined index: patient_id' in /var/www/html/ayushman/application/classes/controller/cpatienthistory.php:714
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatienthistory.php(714): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 714, Array)
#1 [internal function]: Controller_Cpatienthistory->action_risk()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatienthistory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2014-12-04 13:29:01 --- ERROR: #0 [internal function]: Controller_Cpatienthistory->action_risk()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatienthistory))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2014-12-04 13:29:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:29:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:29:18 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:29:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:29:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:29:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:36:38 --- ERROR: HTTP_Exception_400 [ 400 ]:  ~ APPPATH/classes/controller/cpatienthistory.php [ 775 ]
2014-12-04 13:36:38 --- ERROR: #0 [internal function]: Controller_Cpatienthistory->action_appointments()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatienthistory))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2014-12-04 13:36:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:36:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:36:38 --- ERROR: exception 'ErrorException' with message 'Undefined index: patient_id' in /var/www/html/ayushman/application/classes/controller/cpatienthistory.php:714
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatienthistory.php(714): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 714, Array)
#1 [internal function]: Controller_Cpatienthistory->action_risk()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatienthistory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2014-12-04 13:36:38 --- ERROR: #0 [internal function]: Controller_Cpatienthistory->action_risk()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatienthistory))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2014-12-04 13:36:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:36:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:36:38 --- ERROR: HTTP_Exception_400 [ 400 ]:  ~ APPPATH/classes/controller/cpatienthistory.php [ 795 ]
2014-12-04 13:36:38 --- ERROR: #0 [internal function]: Controller_Cpatienthistory->action_reports()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatienthistory))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2014-12-04 13:36:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:36:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:36:38 --- ERROR: Undefined variable: appointments
2014-12-04 13:36:38 --- ERROR: #0 /var/www/html/ayushman/application/classes/controller/newcemrdashboard.php(325): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 325, Array)
#1 [internal function]: Controller_Newcemrdashboard->action_getPastAllData()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Newcemrdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2014-12-04 13:36:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:36:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:36:39 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:36:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:36:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:36:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:36:47 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2014-12-04 13:36:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:36:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:36:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:36:47 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 13:36:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:36:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:36:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:36:50 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 13:36:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 13:36:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:36:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 13:36:51 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 13:36:51 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 13:36:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 13:36:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 14:03:40 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-04 14:03:40 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 14:03:40 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 14:03:40 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 14:03:46 --- ERROR: Unable to find a route to match the URI: Faq.html
2014-12-04 14:03:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 14:03:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 14:03:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 14:09:03 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-04 14:09:03 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 14:09:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 14:09:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 14:36:55 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 14:36:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 14:36:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 14:36:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 14:36:57 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 14:36:57 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 14:36:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 14:36:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 14:36:57 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 14:36:57 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 14:36:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 14:36:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 15:09:09 --- ERROR: Unable to find a route to match the URI: cregistrar/deps.js
2014-12-04 15:09:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 15:09:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 15:09:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:31:06 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 16:31:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:31:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:31:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:31:08 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 16:31:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:31:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:31:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:31:09 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 16:31:09 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 16:31:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:31:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:31:32 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 16:31:32 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:31:32 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:31:32 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:32:38 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 16:32:38 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:32:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:32:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:32:38 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 16:32:38 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 16:32:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:32:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:38:11 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 16:38:11 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 16:38:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:38:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:38:11 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 16:38:11 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 16:38:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:38:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:38:11 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 16:38:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:38:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:38:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:38:13 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 16:38:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:38:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:38:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:38:14 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 16:38:14 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 16:38:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:38:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:38:14 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 16:38:14 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 16:38:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:38:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:38:42 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 16:38:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:38:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:38:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:38:42 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 16:38:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:38:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:38:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:38:43 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 16:38:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:38:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:38:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:41:39 --- ERROR: Unable to find a route to match the URI: cpathologistprofile/deps.js
2014-12-04 16:41:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:41:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:41:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:41:40 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_65_ffffff_1x400.png
2014-12-04 16:41:40 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:41:40 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:41:40 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:41:53 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_100_fdf5ce_1x400.png
2014-12-04 16:41:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:41:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:41:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:43:13 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_65_ffffff_1x400.png
2014-12-04 16:43:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:43:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:43:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:43:20 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png
2014-12-04 16:43:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:43:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:43:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:43:25 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_100_fdf5ce_1x400.png
2014-12-04 16:43:25 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:43:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:43:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:48:30 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 16:48:30 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 16:48:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:48:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:48:36 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 16:48:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:48:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:48:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:48:38 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 16:48:38 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 16:48:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:48:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 16:48:38 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 16:48:38 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 16:48:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 16:48:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:20:03 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 17:20:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:20:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:20:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:20:03 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 17:20:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:20:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:20:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:33:42 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-04 17:33:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:33:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:33:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:39:12 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 17:39:12 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:39:12 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:39:12 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:39:12 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 17:39:12 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 17:39:12 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:39:12 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:39:17 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 17:39:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:39:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:39:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:39:18 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 17:39:18 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 17:39:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:39:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:53:25 --- ERROR: Unable to find a route to match the URI: cregistrar/deps.js
2014-12-04 17:53:25 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:53:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:53:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:53:49 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 17:53:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:53:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:53:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:55:52 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 17:55:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:55:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:55:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:56:50 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 17:56:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:56:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:56:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:57:06 --- ERROR: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}}
2014-12-04 17:57:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:57:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:57:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:57:15 --- ERROR: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}}
2014-12-04 17:57:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:57:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:57:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:57:16 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png
2014-12-04 17:57:16 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:57:16 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:57:16 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:57:37 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 17:57:37 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:57:37 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:57:37 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 17:58:07 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 17:58:07 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 17:58:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 17:58:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:05:50 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:05:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:05:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:05:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:06:31 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:06:31 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:06:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:06:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:08:43 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:08:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:08:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:08:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:22:56 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:22:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:22:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:22:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:23:17 --- ERROR: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}}
2014-12-04 18:23:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:23:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:23:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:23:27 --- ERROR: Unable to find a route to match the URI: cdoctorclinic/deps.js
2014-12-04 18:23:27 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:23:27 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:23:27 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:23:45 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2014-12-04 18:23:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:23:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:23:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:25:19 --- ERROR: Unable to find a route to match the URI: cdoctorclinic/images/bullet.png
2014-12-04 18:25:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:25:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:25:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:25:19 --- ERROR: Unable to find a route to match the URI: cdoctorclinic/deps.js
2014-12-04 18:25:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:25:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:25:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:25:19 --- ERROR: Unable to find a route to match the URI: cdoctorclinic/images/bullet.png
2014-12-04 18:25:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:25:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:25:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:25:32 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:25:32 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:25:32 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:25:32 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:25:33 --- ERROR: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}}
2014-12-04 18:25:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:25:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:25:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:25:34 --- ERROR: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}}
2014-12-04 18:25:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:25:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:25:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:25:34 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png
2014-12-04 18:25:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:25:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:25:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:25:54 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png
2014-12-04 18:25:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:25:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:25:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:25:54 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_65_ffffff_1x400.png
2014-12-04 18:25:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:25:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:25:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:26:01 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_100_fdf5ce_1x400.png
2014-12-04 18:26:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:26:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:26:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:26:05 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:26:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:26:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:26:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:30:07 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-04 18:30:07 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:30:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:30:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:32:19 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 18:32:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:32:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:32:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:32:52 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png
2014-12-04 18:32:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:32:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:32:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:34:07 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png
2014-12-04 18:34:07 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:34:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:34:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:36:18 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:36:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:36:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:36:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:37:06 --- ERROR: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}}
2014-12-04 18:37:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:37:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:37:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:37:06 --- ERROR: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}}
2014-12-04 18:37:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:37:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:37:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:37:51 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:37:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:37:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:37:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:39:56 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:39:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:39:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:39:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:40:43 --- ERROR: Unable to find a route to match the URI: cdoctordashboard/{{myprofile['userinfo'].PatientPhoto}}
2014-12-04 18:40:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:40:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:40:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:42:46 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 18:42:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:42:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:42:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:42:47 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 18:42:47 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 18:42:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:42:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:42:51 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:42:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:42:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:42:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:43:44 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:43:44 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:43:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:43:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:43:44 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:43:44 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:43:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:43:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:43:47 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:43:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:43:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:43:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:43:59 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 18:43:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:43:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:43:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:44:00 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 18:44:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:44:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:44:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:44:00 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 18:44:00 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 18:44:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:44:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:45:21 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:45:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:45:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:45:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:48:49 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:48:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:48:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:48:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:48:55 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:48:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:48:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:48:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:48:58 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:48:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:48:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:48:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:49:08 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:49:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:49:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:49:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:49:39 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:49:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:49:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:49:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:49:39 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 18:49:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:49:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:49:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:49:55 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 18:49:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 18:49:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:49:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 18:49:55 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 18:49:55 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 18:49:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 18:49:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:14:54 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2014-12-04 19:14:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:14:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:14:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:15:15 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 19:15:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:15:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:15:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:15:28 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png
2014-12-04 19:15:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:15:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:15:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:15:28 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 19:15:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:15:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:15:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:15:36 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png
2014-12-04 19:15:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:15:36 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_65_ffffff_1x400.png
2014-12-04 19:15:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:15:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:15:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:15:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:15:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:15:42 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_glass_100_fdf5ce_1x400.png
2014-12-04 19:15:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:15:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:15:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:16:17 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png
2014-12-04 19:16:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:16:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:16:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:16:31 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_ef8c08_256x240.png
2014-12-04 19:16:31 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:16:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:16:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:16:54 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png
2014-12-04 19:16:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:16:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:16:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:16:54 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 19:16:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:16:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:16:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:19:58 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2014-12-04 19:19:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:19:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:19:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:19:58 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 19:19:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:19:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:19:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:23:00 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2014-12-04 19:23:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:23:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:23:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:25:06 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2014-12-04 19:25:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:25:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:25:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:28:51 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2014-12-04 19:28:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:28:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:28:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:28:51 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 19:28:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:28:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:28:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:28:52 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 19:28:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:28:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:28:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:28:52 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 19:28:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:28:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:28:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:29:07 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 19:29:07 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:29:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:29:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:30:04 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 19:30:04 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:30:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:30:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 19:30:06 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 19:30:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 19:30:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 19:30:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:00:16 --- ERROR: Unable to find a route to match the URI: cregistrar/deps.js
2014-12-04 20:00:16 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:00:16 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:00:16 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:51:50 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 20:51:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:51:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:51:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:51:51 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 20:51:51 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 20:51:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:51:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:52:46 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 20:52:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:52:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:52:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:52:52 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 20:52:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:52:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:52:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:52:54 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-icons_222222_256x240.png
2014-12-04 20:52:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:52:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:52:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:52:56 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:52:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:52:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:52:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:53:04 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 20:53:04 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 20:53:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:53:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:53:49 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:53:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:53:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:53:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:53:55 --- ERROR: Unable to find a route to match the URI: assets/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2014-12-04 20:53:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:53:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:53:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:53:58 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:53:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:53:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:53:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:54:02 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:54:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:54:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:54:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:54:24 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:54:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:54:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:54:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:54:27 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:54:27 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:54:27 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:54:27 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:54:33 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:54:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:54:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:54:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:54:43 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:54:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:54:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:54:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:54:44 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:54:44 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:54:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:54:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:55:20 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:55:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:55:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:55:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:55:38 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:55:38 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:55:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:55:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:55:50 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:55:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:55:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:55:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:56:30 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:56:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:56:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:56:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:56:30 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:56:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:56:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:56:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:56:45 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:56:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:56:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:56:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:56:47 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:56:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:56:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:56:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:57:42 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:57:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:57:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:57:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:57:45 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:57:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:57:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:57:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:57:46 --- ERROR: Unable to find a route to match the URI: cpatienthistorydisplay/{{patientinfo.PatientPhoto}}
2014-12-04 20:57:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:57:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:57:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:57:49 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:57:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:57:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:57:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:58:20 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:58:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:58:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:58:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:58:30 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:58:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:58:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:58:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:58:32 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:58:32 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:58:32 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:58:32 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:58:43 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:58:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:58:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:58:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:58:48 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:58:48 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:58:48 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:58:48 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:58:53 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:58:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:58:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:58:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:58:59 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:58:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:58:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:58:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:59:05 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:59:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:59:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:59:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:59:21 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:59:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:59:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:59:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:59:22 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:59:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:59:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:59:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:59:25 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:59:25 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:59:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:59:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:59:41 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:59:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:59:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:59:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:59:52 --- ERROR: Undefined variable: error
2014-12-04 20:59:52 --- ERROR: #0 /var/www/html/ayushman/application/classes/controller/cchangepassword.php(203): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 203, Array)
#1 [internal function]: Controller_Cchangepassword->action_savescriptuserchanges()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cchangepassword))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2014-12-04 20:59:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:59:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:59:53 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:59:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:59:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:59:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 20:59:54 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 20:59:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 20:59:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 20:59:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:00:00 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 21:00:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:00:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:00:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:00:24 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 21:00:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:00:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:00:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:00:24 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 21:00:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:00:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:00:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:00:24 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 21:00:24 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 21:00:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:00:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:00:25 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 21:00:25 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:00:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:00:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:00:33 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 21:00:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:00:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:00:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:00:36 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 21:00:36 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 21:00:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:00:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:00:58 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 21:00:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:00:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:00:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:01:02 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 21:01:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:01:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:01:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:01:17 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 21:01:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:01:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:01:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:01:17 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 21:01:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:01:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:01:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:01:24 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-04 21:01:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:01:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:01:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:01:25 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-04 21:01:25 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 21:01:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:01:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:01:26 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 21:01:26 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:01:26 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:01:26 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:02:39 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 21:02:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:02:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:02:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:02:41 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-04 21:02:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-04 21:02:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:02:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:04:18 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-04 21:04:18 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 21:04:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:04:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:04:23 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-04 21:04:23 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 21:04:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:04:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:08:35 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-04 21:08:35 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 21:08:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:08:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-04 21:09:19 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-04 21:09:19 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-04 21:09:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-04 21:09:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}