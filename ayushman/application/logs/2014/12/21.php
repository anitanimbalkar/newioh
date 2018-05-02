<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-12-21 00:01:05 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2014-12-21 00:01:05 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2014-12-21 00:01:05 --- ERROR: Undefined variable: plugin
2014-12-21 00:01:05 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
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
2014-12-21 00:01:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 00:01:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 02:07:20 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 02:07:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 02:07:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 02:07:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 02:21:43 --- ERROR: Unable to find a route to match the URI: Doctors.shtml
2014-12-21 02:21:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 02:21:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 02:21:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 04:03:56 --- ERROR: Unable to find a route to match the URI: Mission.shtml
2014-12-21 04:03:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 04:03:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 04:03:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 05:05:06 --- ERROR: Unable to find a route to match the URI: Feedback.shtml
2014-12-21 05:05:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 05:05:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 05:05:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 05:05:19 --- ERROR: Unable to find a route to match the URI: Contactus.shtml
2014-12-21 05:05:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 05:05:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 05:05:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 06:04:11 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 06:04:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 06:04:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 06:04:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 06:04:13 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 06:04:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 06:04:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 06:04:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 06:04:13 --- ERROR: Unable to find a route to match the URI: Doctors.shtml
2014-12-21 06:04:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 06:04:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 06:04:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 06:05:03 --- ERROR: Unable to find a route to match the URI: Thanku.shtml
2014-12-21 06:05:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 06:05:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 06:05:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 06:16:00 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 06:16:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 06:16:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 06:16:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 06:28:23 --- ERROR: Unable to find a route to match the URI: ServiceProviders.shtml
2014-12-21 06:28:23 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 06:28:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 06:28:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 06:38:54 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 06:38:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 06:38:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 06:38:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 06:46:17 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 06:46:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 06:46:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 06:46:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 06:56:34 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-21 06:56:34 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-21 06:56:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 06:56:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 07:00:58 --- ERROR: Unable to find a route to match the URI: Consumers.shtml
2014-12-21 07:00:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 07:00:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 07:00:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 07:40:06 --- ERROR: Unable to find a route to match the URI: AyushDeep.shtml
2014-12-21 07:40:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 07:40:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 07:40:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 08:01:47 --- ERROR: Unable to find a route to match the URI: Faq.shtml
2014-12-21 08:01:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 08:01:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 08:01:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 08:01:59 --- ERROR: Unable to find a route to match the URI: HowitWorks.shtml
2014-12-21 08:01:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 08:01:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 08:01:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 08:55:46 --- ERROR: Unable to find a route to match the URI: Mission.shtml
2014-12-21 08:55:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 08:55:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 08:55:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 08:59:15 --- ERROR: Unable to find a route to match the URI: Mission.shtml
2014-12-21 08:59:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 08:59:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 08:59:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 09:00:04 --- ERROR: Unable to find a route to match the URI: AyushCorp.shtml
2014-12-21 09:00:04 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 09:00:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 09:00:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:13:25 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 10:13:25 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:13:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:13:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:13:26 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 10:13:26 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:13:26 --- ERROR: Unable to find a route to match the URI: images/plus1.png
2014-12-21 10:13:26 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:13:26 --- ERROR: Unable to find a route to match the URI: assets/images/photoGallery.gif
2014-12-21 10:13:26 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:13:26 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:13:26 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:13:26 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:13:26 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:13:26 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:13:26 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:13:26 --- ERROR: Unable to find a route to match the URI: images/bg_noswoop.png
2014-12-21 10:13:26 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:13:26 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:13:26 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:13:42 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 10:13:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:13:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:13:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:13:42 --- ERROR: Unable to find a route to match the URI: assets/images/photoGallery.gif
2014-12-21 10:13:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:13:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:13:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:13:42 --- ERROR: Unable to find a route to match the URI: images/plus1.png
2014-12-21 10:13:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:13:42 --- ERROR: Unable to find a route to match the URI: images/bg_noswoop.png
2014-12-21 10:13:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:13:42 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 10:13:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:13:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:13:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:13:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:13:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:13:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:13:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:23 --- ERROR: Unable to find a route to match the URI: images/bg_noswoop.png
2014-12-21 10:14:23 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:23 --- ERROR: Unable to find a route to match the URI: images/plus1.png
2014-12-21 10:14:23 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:23 --- ERROR: Unable to find a route to match the URI: assets/images/photoGallery.gif
2014-12-21 10:14:23 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:23 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 10:14:23 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:23 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 10:14:23 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_lineBold.png
2014-12-21 10:14:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_line.png
2014-12-21 10:14:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/DashboardBtn_bg.png
2014-12-21 10:14:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/teble_bg.png
2014-12-21 10:14:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 10:14:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 10:14:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:55 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:14:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:56 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/DashboardBtn_bg.png
2014-12-21 10:14:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:56 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_line.png
2014-12-21 10:14:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:56 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/teble_bg.png
2014-12-21 10:14:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:14:56 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_lineBold.png
2014-12-21 10:14:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:14:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:14:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:17 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 10:15:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:17 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 10:15:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:18 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/DashboardBtn_bg.png
2014-12-21 10:15:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:18 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/teble_bg.png
2014-12-21 10:15:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:18 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_lineBold.png
2014-12-21 10:15:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:18 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_line.png
2014-12-21 10:15:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:19 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:15:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:20 --- ERROR: Unable to find a route to match the URI: cpatienthistorydisplay/{{patientinfo.PatientPhoto}}
2014-12-21 10:15:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:20 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 10:15:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:20 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 10:15:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:15:44 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:15:44 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:15:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:15:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_lineBold.png
2014-12-21 10:16:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/DashboardBtn_bg.png
2014-12-21 10:16:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_line.png
2014-12-21 10:16:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/teble_bg.png
2014-12-21 10:16:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 10:16:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 10:16:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:22 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/DashboardBtn_bg.png
2014-12-21 10:16:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:22 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_lineBold.png
2014-12-21 10:16:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:22 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/teble_bg.png
2014-12-21 10:16:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:22 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_line.png
2014-12-21 10:16:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:23 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 10:16:23 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:23 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 10:16:23 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:33 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/DashboardBtn_bg.png
2014-12-21 10:16:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:33 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_lineBold.png
2014-12-21 10:16:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:33 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_line.png
2014-12-21 10:16:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:33 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/teble_bg.png
2014-12-21 10:16:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:34 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 10:16:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:34 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 10:16:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:16:59 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:16:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:16:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:16:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:19:07 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-21 10:19:07 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-21 10:19:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:19:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:19:15 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2014-12-21 10:19:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:19:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:19:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:19:15 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:19:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:19:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:19:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:20:36 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2014-12-21 10:20:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:20:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:20:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:20:36 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:20:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:20:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:20:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:26:04 --- ERROR: Unable to find a route to match the URI: AyushCorp.shtml
2014-12-21 10:26:04 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:26:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:26:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:28:37 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2014-12-21 10:28:37 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:28:37 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:28:37 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:33:32 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2014-12-21 10:33:32 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:33:32 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:33:32 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:35:18 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:35:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:35:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:35:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:35:18 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2014-12-21 10:35:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:35:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:35:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:35:33 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:35:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:35:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:35:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:35:41 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:35:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:35:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:35:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:35:41 --- ERROR: Unable to find a route to match the URI: cconsultation/{{patientinfo.PatientPhoto}}
2014-12-21 10:35:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:35:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:35:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:35:44 --- ERROR: Unable to find a route to match the URI: cconsultation/{{patientinfo.PatientPhoto}}
2014-12-21 10:35:44 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:35:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:35:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:35:45 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:35:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:35:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:35:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:37:17 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 10:37:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:37:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:37:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:37:17 --- ERROR: Unable to find a route to match the URI: cconsultation/{{appointment.PatientPhoto}}
2014-12-21 10:37:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 10:37:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:37:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:37:20 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-21 10:37:20 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-21 10:37:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:37:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 10:45:14 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-21 10:45:14 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-21 10:45:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 10:45:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 11:03:01 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2014-12-21 11:03:01 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2014-12-21 11:03:01 --- ERROR: Undefined variable: plugin
2014-12-21 11:03:01 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
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
2014-12-21 11:03:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 11:03:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:07:10 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-21 12:07:10 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-21 12:07:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:07:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:03 --- ERROR: Unable to find a route to match the URI: assets/images/photoGallery.gif
2014-12-21 12:25:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:03 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 12:25:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:03 --- ERROR: Unable to find a route to match the URI: images/plus1.png
2014-12-21 12:25:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:03 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 12:25:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:03 --- ERROR: Unable to find a route to match the URI: images/bg_noswoop.png
2014-12-21 12:25:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 12:25:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/DashboardBtn_bg.png
2014-12-21 12:25:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_lineBold.png
2014-12-21 12:25:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 12:25:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_line.png
2014-12-21 12:25:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/teble_bg.png
2014-12-21 12:25:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:52 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 12:25:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:53 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/DashboardBtn_bg.png
2014-12-21 12:25:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:53 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_lineBold.png
2014-12-21 12:25:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:53 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_line.png
2014-12-21 12:25:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:53 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/teble_bg.png
2014-12-21 12:25:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:25:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:25:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:25:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:26:05 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/teble_bg.png
2014-12-21 12:26:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:26:05 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_lineBold.png
2014-12-21 12:26:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:26:05 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/Box_line.png
2014-12-21 12:26:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:26:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:26:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:26:05 --- ERROR: Unable to find a route to match the URI: assets/images/Top_bg.gif
2014-12-21 12:26:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:26:05 --- ERROR: Unable to find a route to match the URI: assets/css/assets/images/DashboardBtn_bg.png
2014-12-21 12:26:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:26:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:26:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:26:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:26:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:26:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:26:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:26:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:26:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:26:06 --- ERROR: Unable to find a route to match the URI: assets/images/logo_bg.gif
2014-12-21 12:26:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:26:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:26:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:26:18 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 12:26:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:26:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:26:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:27:25 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 12:27:25 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:27:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:27:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:30:14 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 12:30:14 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:30:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:30:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:30:15 --- ERROR: Unable to find a route to match the URI: cpatienthistorydisplay/{{patientinfo.PatientPhoto}}
2014-12-21 12:30:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:30:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:30:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:31:00 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 12:31:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:31:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:31:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:36:11 --- ERROR: Unable to find a route to match the URI: favicon.ico
2014-12-21 12:36:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 12:36:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:36:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 12:57:44 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-21 12:57:44 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-21 12:57:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 12:57:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 13:30:05 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 13:30:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 13:30:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 13:30:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 13:30:05 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2014-12-21 13:30:05 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2014-12-21 13:30:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 13:30:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 16:30:07 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 16:30:07 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 16:30:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 16:30:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 16:34:39 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 16:34:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 16:34:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 16:34:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 16:34:55 --- ERROR: Unable to find a route to match the URI: Contactus.shtml
2014-12-21 16:34:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 16:34:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 16:34:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 17:50:54 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 17:50:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 17:50:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 17:50:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 18:49:33 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 18:49:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 18:49:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 18:49:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 18:49:34 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 18:49:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 18:49:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 18:49:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2014-12-21 21:08:14 --- ERROR: Unable to find a route to match the URI: robots.txt
2014-12-21 21:08:14 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2014-12-21 21:08:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:107
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(107): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 107, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2014-12-21 21:08:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}