<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-09-22 00:01:02 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2015-09-22 00:01:02 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-09-22 00:01:02 --- ERROR: Undefined variable: plugin
2015-09-22 00:01:02 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
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
2015-09-22 00:01:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 00:01:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 00:30:21 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 00:30:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 00:30:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 00:30:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 00:30:28 --- ERROR: Unable to find a route to match the URI: home/faq.shtml
2015-09-22 00:30:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 00:30:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 00:30:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 00:30:28 --- ERROR: The requested URL home/Return was not found on this server.
2015-09-22 00:30:28 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 00:30:28 --- ERROR: The requested URL home/Terms was not found on this server.
2015-09-22 00:30:28 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 00:30:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 00:30:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 00:30:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 00:30:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 00:30:29 --- ERROR: The requested URL home/Privacy was not found on this server.
2015-09-22 00:30:29 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 00:30:29 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 00:30:29 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:13:44 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 01:13:44 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:13:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:13:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:08 --- ERROR: Unable to find a route to match the URI: atom.xml
2015-09-22 01:31:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:10 --- ERROR: Unable to find a route to match the URI: index.atom
2015-09-22 01:31:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:11 --- ERROR: Unable to find a route to match the URI: index.rdf
2015-09-22 01:31:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:12 --- ERROR: Unable to find a route to match the URI: rss.xml
2015-09-22 01:31:12 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:12 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:12 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:13 --- ERROR: Unable to find a route to match the URI: index.xml
2015-09-22 01:31:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:14 --- ERROR: Unable to find a route to match the URI: index.rss
2015-09-22 01:31:14 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:17 --- ERROR: Unable to find a route to match the URI: atom.xml
2015-09-22 01:31:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:18 --- ERROR: Unable to find a route to match the URI: index.atom
2015-09-22 01:31:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:19 --- ERROR: Unable to find a route to match the URI: index.rdf
2015-09-22 01:31:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:20 --- ERROR: Unable to find a route to match the URI: rss.xml
2015-09-22 01:31:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:21 --- ERROR: Unable to find a route to match the URI: index.xml
2015-09-22 01:31:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:22 --- ERROR: Unable to find a route to match the URI: index.rss
2015-09-22 01:31:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 01:31:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:36 --- ERROR: The requested URL blog was not found on this server.
2015-09-22 01:31:36 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 01:31:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:37 --- ERROR: The requested URL feed was not found on this server.
2015-09-22 01:31:37 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 01:31:37 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:37 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 01:31:39 --- ERROR: The requested URL blog/feed was not found on this server.
2015-09-22 01:31:39 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 01:31:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 01:31:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 03:44:51 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 03:44:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 03:44:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 03:44:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 05:57:17 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 05:57:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 05:57:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 05:57:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:15:36 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 10:15:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:15:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:15:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:16:14 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 10:16:14 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:16:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:16:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:17:31 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 10:17:31 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:17:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:17:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:17:38 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 10:17:38 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:17:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:17:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:30:03 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 10:30:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:30:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:30:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:33:31 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 10:33:31 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:33:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:33:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:35:28 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 10:35:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:35:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:35:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:35:33 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 10:35:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:35:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:35:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:42:02 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 10:42:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:42:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:42:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:44:15 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 10:44:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:44:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:44:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:49:09 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 10:49:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:49:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:49:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 10:49:10 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 10:49:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 10:49:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 10:49:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:02:22 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:02:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:02:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:02:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:08:50 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:08:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:08:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:08:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:11:04 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 11:11:04 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:11:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:11:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:11:11 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 11:11:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:11:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:11:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:13:36 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 11:13:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:13:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:13:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:13:38 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 11:13:38 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:13:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:13:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:15:33 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 11:15:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:15:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:15:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:15:39 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 11:15:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:15:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:15:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:15:45 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:15:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:15:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:15:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:19:42 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:19:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:19:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:19:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:20:24 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 11:20:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:20:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:20:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:22:08 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 11:22:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:22:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:22:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:22:11 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 11:22:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:22:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:22:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:24:23 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:24:23 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:24:23 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:24:23 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:28:27 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:28:27 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:28:27 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:28:27 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:28:50 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 11:28:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:28:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:28:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:28:53 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 11:28:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:28:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:28:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:29:51 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:29:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:29:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:29:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:30:33 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 11:30:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:30:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:30:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:31:12 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 11:31:12 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:31:12 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:31:12 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:31:19 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 11:31:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:31:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:31:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:32:17 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:32:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:32:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:32:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:32:49 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 11:32:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:32:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:32:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:35:07 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 11:35:07 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:35:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:35:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:35:47 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 11:35:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:35:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:35:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:37:25 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:37:25 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:37:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:37:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:38:51 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:38:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:38:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:38:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:39:09 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 11:39:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:39:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:39:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:41:41 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 11:41:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:41:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:41:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:42:01 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 11:42:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:42:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:42:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:42:10 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 11:42:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:42:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:42:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:44:54 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 11:44:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:44:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:44:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:45:02 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 11:45:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:45:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:45:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:50:11 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 11:50:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:50:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:50:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:52:53 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 11:52:53 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:52:53 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:52:53 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:54:32 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 11:54:32 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:54:32 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:54:32 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:54:39 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 11:54:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:54:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:54:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:56:38 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-09-22 11:56:38 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 11:56:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:56:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:56:49 --- ERROR: Unable to find a route to match the URI: cregistrar/deps.js
2015-09-22 11:56:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:56:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:56:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:56:59 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-09-22 11:56:59 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 11:56:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:56:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:59:21 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-09-22 11:59:21 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 11:59:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:59:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:59:24 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-09-22 11:59:24 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 11:59:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:59:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:59:46 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-09-22 11:59:46 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 11:59:46 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:59:46 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:59:54 --- ERROR: The requested URL assets/images/smallLogo was not found on this server.
2015-09-22 11:59:54 --- ERROR: #0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2015-09-22 11:59:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:59:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 11:59:57 --- ERROR: Unable to find a route to match the URI: cregistrar/deps.js
2015-09-22 11:59:57 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 11:59:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 11:59:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:07:58 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 12:07:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:07:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:07:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:10:10 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 12:10:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:10:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:10:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:12:05 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 12:12:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:12:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:12:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:12:08 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 12:12:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:12:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:12:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:28:02 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2015-09-22 12:28:02 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-09-22 12:28:02 --- ERROR: Undefined variable: plugin
2015-09-22 12:28:02 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
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
2015-09-22 12:28:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:28:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:35:57 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 12:35:57 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:35:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:35:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:36:40 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 12:36:40 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:36:40 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:36:40 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:37:38 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 12:37:38 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:37:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:37:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:37:43 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 12:37:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:37:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:37:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:40:09 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 12:40:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:40:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:40:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:40:30 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 12:40:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:40:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:40:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:55:03 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 12:55:03 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:55:03 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:55:03 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:55:52 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 12:55:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:55:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:55:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:57:22 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 12:57:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:57:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:57:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 12:57:35 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 12:57:35 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 12:57:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 12:57:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:02:04 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 13:02:04 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:02:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:02:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:02:24 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 13:02:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:02:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:02:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:04:08 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 13:04:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:04:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:04:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:04:11 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 13:04:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:04:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:04:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:11:19 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 13:11:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:11:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:11:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:14:22 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 13:14:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:14:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:14:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:17:48 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 13:17:48 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:17:48 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:17:48 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:18:25 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 13:18:25 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:18:25 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:18:25 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:18:54 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 13:18:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:18:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:18:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:19:16 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 13:19:16 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:19:16 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:19:16 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:20:35 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 13:20:35 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:20:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:20:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:22:39 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 13:22:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:22:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:22:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:38:20 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 13:38:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:38:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:38:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 13:39:34 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 13:39:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 13:39:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 13:39:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 14:02:31 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 14:02:31 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 14:02:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 14:02:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 14:03:00 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 14:03:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 14:03:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 14:03:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 14:05:30 --- ERROR: Call to a member function has() on a non-object
2015-09-22 14:05:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 14:05:31 --- ERROR: Call to a member function has() on a non-object
2015-09-22 14:05:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 15:08:14 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 15:08:14 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 15:08:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 15:08:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 15:39:19 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 15:39:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 15:39:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 15:39:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 16:32:36 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 16:32:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 16:32:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 16:32:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 17:22:01 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 17:22:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 17:22:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 17:22:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 17:31:15 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 17:31:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 17:31:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 17:31:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:17:19 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 18:17:19 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:17:19 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:17:19 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:19:15 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 18:19:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:19:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:19:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:21:58 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 18:21:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:21:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:21:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:22:15 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 18:22:15 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:22:15 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:22:15 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:26:31 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 18:26:31 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:26:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:26:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:32:11 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 18:32:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:32:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:32:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:33:59 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 18:33:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:33:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:33:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:34:09 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 18:34:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:34:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:34:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:39:01 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 18:39:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:39:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:39:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:43:01 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 18:43:01 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:43:01 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:43:01 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:46:22 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 18:46:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:46:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:46:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 18:46:34 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 18:46:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 18:46:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 18:46:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 19:38:27 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 19:38:27 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 19:38:27 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 19:38:27 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 19:40:30 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 19:40:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 19:40:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 19:40:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 19:40:33 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 19:40:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 19:40:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 19:40:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 19:42:17 --- ERROR: Unable to find a route to match the URI: home/js/jquery-1.11.1.js
2015-09-22 19:42:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 19:42:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 19:42:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 19:42:55 --- ERROR: Unable to find a route to match the URI: cregistrar/deps.js
2015-09-22 19:42:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 19:42:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 19:42:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 19:45:20 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 19:45:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 19:45:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 19:45:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 19:46:30 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 19:46:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 19:46:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 19:46:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 19:47:17 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 19:47:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 19:47:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 19:47:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 19:47:18 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 19:47:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 19:47:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 19:47:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:03:51 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 20:03:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:03:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:03:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:04:37 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 20:04:37 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:04:37 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:04:37 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:04:39 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 20:04:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:04:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:04:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:07:02 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 20:07:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:07:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:07:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:09:21 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 20:09:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:09:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:09:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:10:54 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-09-22 20:10:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:10:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:10:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:11:58 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 20:11:58 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:11:58 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:11:58 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:12:00 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 20:12:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:12:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:12:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:14:45 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-09-22 20:14:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:14:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:14:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:18:08 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-09-22 20:18:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:18:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:18:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:18:11 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-09-22 20:18:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:18:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:18:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 20:34:54 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-09-22 20:34:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 20:34:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 20:34:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 21:32:50 --- ERROR: Unable to find a route to match the URI: browserconfig.xml
2015-09-22 21:32:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 21:32:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 21:32:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 22:17:41 --- ERROR: Unable to find a route to match the URI: ws/orders.json
2015-09-22 22:17:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 22:17:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 22:17:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-09-22 23:42:06 --- ERROR: Unable to find a route to match the URI: get.php/media/dhl/.htaccess
2015-09-22 23:42:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-09-22 23:42:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-09-22 23:42:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}