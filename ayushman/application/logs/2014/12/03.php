<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-12-03 00:01:02 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2014-12-03 00:01:02 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2014-12-03 00:01:02 --- ERROR: Undefined variable: plugin
2014-12-03 00:01:02 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
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
2014-12-03 00:01:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 00:01:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 00:21:32 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-03 00:21:32 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 00:21:32 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 00:21:32 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 01:59:13 --- ERROR: Unable to find a route to match the URI: cpasswordmanager/Thanku.html
2014-12-03 01:59:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 01:59:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 01:59:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 04:42:24 --- ERROR: Unable to find a route to match the URI: cayushcaremanager/Thanku.html
2014-12-03 04:42:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 04:42:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 04:42:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 04:42:35 --- ERROR: Unable to find a route to match the URI: cregistrar/Thanku.html
2014-12-03 04:42:35 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 04:42:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 04:42:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 07:31:54 --- ERROR: Unable to find a route to match the URI: cpasswordmanager/Thanku.html
2014-12-03 07:31:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 07:31:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 07:31:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 08:13:51 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-03 08:13:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 08:13:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 08:13:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 08:31:42 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 08:31:42 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 08:31:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 08:31:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 09:09:56 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 09:09:56 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 09:09:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 09:09:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 09:12:26 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-03 09:12:26 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 09:12:26 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 09:12:26 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 10:28:12 --- ERROR: Unable to find a route to match the URI: cregistrar/Thanku.html
2014-12-03 10:28:12 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 10:28:12 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 10:28:12 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 10:57:41 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 10:57:41 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 10:57:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 10:57:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:03:01 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2014-12-03 11:03:01 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2014-12-03 11:03:01 --- ERROR: Undefined variable: plugin
2014-12-03 11:03:01 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
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
2014-12-03 11:03:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:03:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:25:09 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 11:25:09 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 11:25:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:25:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:25:44 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 11:25:44 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:25:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:25:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:25:44 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 11:25:44 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 11:25:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:25:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:28:58 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 11:28:58 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 11:28:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:28:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:31:45 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 11:31:45 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 11:31:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:31:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:32:45 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:32:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:32:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:32:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:32:57 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:32:57 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:32:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:32:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:33:13 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:33:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:33:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:33:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:34:13 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:34:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:34:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:34:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:34:18 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:34:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:34:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:34:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:34:22 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:34:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:34:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:34:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:34:24 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:34:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:34:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:34:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:36:41 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:36:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:36:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:36:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:36:49 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:36:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:36:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:36:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:36:55 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:36:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:36:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:36:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:37:00 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:37:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:37:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:37:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:39:56 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:39:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:39:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:39:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:40:03 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:40:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:40:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:40:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:40:09 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 11:40:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 11:40:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:40:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:51:44 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 11:51:44 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 11:51:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:51:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:56:13 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 11:56:13 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 11:56:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:56:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 11:59:08 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 11:59:08 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 11:59:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 11:59:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:00:10 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 12:00:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 12:00:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:00:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:00:18 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 12:00:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 12:00:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:00:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:07:33 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 12:07:33 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 12:07:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:07:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:14:09 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-03 12:14:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 12:14:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:14:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:15:42 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 12:15:42 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 12:15:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:15:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:31:49 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 12:31:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 12:31:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:31:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:31:50 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 12:31:50 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 12:31:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:31:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:35:18 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 12:35:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 12:35:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:35:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:35:19 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 12:35:19 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 12:35:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:35:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:35:30 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 12:35:30 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 12:35:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:35:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:35:33 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 12:35:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 12:35:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:35:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:36:14 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 12:36:14 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 12:36:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:36:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:36:16 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 12:36:16 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 12:36:16 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:36:16 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:54:01 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 12:54:01 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 12:54:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:54:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:54:01 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 12:54:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 12:54:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:54:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:54:22 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 12:54:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 12:54:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:54:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:55:09 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 12:55:09 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 12:55:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:55:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 12:59:43 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 12:59:43 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 12:59:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 12:59:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 13:00:41 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 13:00:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 13:00:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 13:00:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 13:00:53 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 13:00:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 13:00:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 13:00:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 13:22:54 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 13:22:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 13:22:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 13:22:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 13:24:06 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 13:24:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 13:24:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 13:24:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 13:27:34 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 13:27:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 13:27:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 13:27:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 14:38:52 --- ERROR: The requested URL cpasswordmanager/displayverifyuserform was not found on this server.
2014-12-03 14:38:52 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 14:38:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 14:38:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 14:48:22 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 14:48:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 14:48:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 14:48:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 14:48:56 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 14:48:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 14:48:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 14:48:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 14:49:01 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 14:49:01 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 14:49:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 14:49:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:05 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 15:02:05 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 15:02:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:05 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 15:02:05 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 15:02:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:06 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 15:02:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 15:02:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:07 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 15:02:07 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 15:02:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:07 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 15:02:07 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 15:02:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:07 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 15:02:07 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 15:02:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:07 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 15:02:07 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 15:02:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:07 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 15:02:07 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 15:02:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:14 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 15:02:14 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 15:02:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:14 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 15:02:14 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 15:02:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:02:14 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 15:02:14 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 15:02:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:02:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:29:21 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 15:29:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 15:29:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:29:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:30:05 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 15:30:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 15:30:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:30:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 15:30:05 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 15:30:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 15:30:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 15:30:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 16:28:57 --- ERROR: Unable to find a route to match the URI: cregistrar/deps.js
2014-12-03 16:28:57 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 16:28:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 16:28:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 16:29:01 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 16:29:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 16:29:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 16:29:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 16:29:20 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 16:29:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 16:29:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 16:29:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 16:29:23 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 16:29:23 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 16:29:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 16:29:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 16:56:47 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 16:56:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 16:56:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 16:56:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 16:56:49 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 16:56:49 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 16:56:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 16:56:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 16:57:54 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 16:57:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 16:57:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 16:57:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 16:57:55 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 16:57:55 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 16:57:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 16:57:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:01:37 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 17:01:37 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 17:01:37 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:01:37 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:04:29 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 17:04:29 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 17:04:29 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:04:29 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:08:53 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 17:08:53 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 17:08:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:08:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:10:02 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 17:10:02 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 17:10:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:10:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:13:38 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 17:13:38 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 17:13:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:13:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:20:40 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 17:20:40 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 17:20:40 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:20:40 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:20:55 --- ERROR: The requested URL cconsultation/getappointmentstest was not found on this server.
2014-12-03 17:20:55 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 17:20:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:20:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:51:04 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 17:51:04 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 17:51:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:51:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:51:19 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 17:51:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 17:51:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:51:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:53:43 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 17:53:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 17:53:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:53:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 17:54:10 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 17:54:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 17:54:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 17:54:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 18:11:43 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-03 18:11:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 18:11:43 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-03 18:11:43 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-03 18:11:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 18:11:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 18:11:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 18:11:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 18:18:41 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-03 18:18:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 18:18:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 18:18:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 19:37:41 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-03 19:37:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 19:37:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 19:37:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 19:49:09 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 19:49:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 19:49:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 19:49:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 19:49:50 --- ERROR: Unable to find a route to match the URI: assets/images/facebook.png
2014-12-03 19:49:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 19:49:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 19:49:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 19:49:54 --- ERROR: Unable to find a route to match the URI: images/bg_noswoop.png
2014-12-03 19:49:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 19:49:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 19:49:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 19:49:55 --- ERROR: Unable to find a route to match the URI: assets/images/ayushcare-btnR.png
2014-12-03 19:49:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 19:49:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 19:49:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 19:49:55 --- ERROR: Unable to find a route to match the URI: assets/images/ayushdeep-btnR.png
2014-12-03 19:49:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 19:49:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 19:49:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 19:49:55 --- ERROR: Unable to find a route to match the URI: assets/images/ayushcorp-btnR.png
2014-12-03 19:49:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 19:49:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 19:49:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-03 20:37:27 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-03 20:37:27 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-03 20:37:27 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:106
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(106): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 106, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-03 20:37:27 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}