<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-10-31 00:01:02 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2015-10-31 00:01:02 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-10-31 00:01:02 --- ERROR: Undefined variable: plugin
2015-10-31 00:01:02 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
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
2015-10-31 00:01:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 00:01:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 00:28:05 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 00:28:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 00:28:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 00:28:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 00:32:22 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 00:32:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 00:32:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 00:32:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 02:22:36 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-10-31 02:22:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 02:22:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 02:22:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 07:14:00 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-10-31 07:14:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 07:14:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 07:14:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 07:43:08 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 07:43:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 07:43:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 07:43:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 07:47:36 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 07:47:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 07:47:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 07:47:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 08:48:17 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 08:48:17 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 08:48:17 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 08:48:17 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 08:48:21 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 08:48:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 08:48:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 08:48:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 08:58:45 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 08:58:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 08:58:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 08:58:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 10:15:06 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 10:15:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 10:15:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 10:15:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 10:33:30 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 10:33:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 10:33:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 10:33:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 10:35:31 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 10:35:31 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 10:35:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 10:35:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 10:35:36 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 10:35:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 10:35:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 10:35:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 10:36:40 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 10:36:40 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 10:36:40 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 10:36:40 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 10:36:42 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 10:36:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 10:36:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 10:36:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 10:36:55 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png
2015-10-31 10:36:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 10:36:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 10:36:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 10:36:55 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png
2015-10-31 10:36:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 10:36:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 10:36:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 10:36:55 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png
2015-10-31 10:36:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 10:36:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 10:36:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 10:37:02 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 10:37:02 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 10:37:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 10:37:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 11:46:36 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-10-31 11:46:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 11:46:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 11:46:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 11:46:36 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-10-31 11:46:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 11:46:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 11:46:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 11:47:26 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 11:47:26 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 11:47:26 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 11:47:26 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 11:57:45 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 11:57:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 11:57:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 11:57:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:00:35 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 12:00:35 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:00:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:00:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:05:38 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 12:05:38 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:05:38 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:05:38 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:05:45 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 12:05:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:05:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:05:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:08:28 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 12:08:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:08:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:08:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:11:39 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 12:11:39 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:11:39 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:11:39 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:12:07 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 12:12:07 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:12:07 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:12:07 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:13:44 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 12:13:44 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:13:44 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:13:44 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:13:57 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 12:13:57 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:13:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:13:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:28:02 --- ERROR: include_once(/ayushman/application/classes/helper/PHPExcel/IOFactory.php): failed to open stream: No such file or directory
2015-10-31 12:28:02 --- ERROR: #0 /var/www/html/ayushman/application/classes/helper/export.php(3): Kohana_Core::error_handler(2, 'include_once(/a...', '/var/www/html/a...', 3, Array)
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
2015-10-31 12:28:02 --- ERROR: Undefined variable: plugin
2015-10-31 12:28:02 --- ERROR: #0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
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
2015-10-31 12:28:02 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:28:02 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:28:55 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-10-31 12:28:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:28:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:28:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:40:09 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 12:40:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:40:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:40:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:43:09 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 12:43:09 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:43:09 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:43:09 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:43:20 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 12:43:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:43:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:43:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:52:00 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 12:52:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:52:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:52:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 12:57:57 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 12:57:57 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 12:57:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 12:57:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 13:00:40 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 13:00:40 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 13:00:40 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 13:00:40 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 13:00:46 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 13:00:46 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 13:00:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 13:00:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 13:01:20 --- ERROR: Trying to get property of non-object
2015-10-31 13:01:20 --- ERROR: #0 /var/www/html/ayushman/application/classes/controller/cappointmenteditor.php(344): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 344, Array)
#1 [internal function]: Controller_Cappointmenteditor->action_bookfollowup()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cappointmenteditor))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2015-10-31 13:01:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 13:01:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 13:21:21 --- ERROR: exception 'ErrorException' with message 'Trying to get property of non-object' in /var/www/html/ayushman/application/classes/controller/cstaffdashboard.php:57
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cstaffdashboard.php(57): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/a...', 57, Array)
#1 /var/www/html/ayushman/application/classes/controller/cstaffdashboard.php(7): Controller_Cstaffdashboard->displayStaffDashboard('', 'vstaffdashboard')
#2 [internal function]: Controller_Cstaffdashboard->action_view()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cstaffdashboard))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}
2015-10-31 13:21:21 --- ERROR: #0 /var/www/html/ayushman/application/classes/controller/cstaffdashboard.php(7): Controller_Cstaffdashboard->displayStaffDashboard('', 'vstaffdashboard')
#1 [internal function]: Controller_Cstaffdashboard->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cstaffdashboard))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2015-10-31 13:21:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 13:21:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 14:00:16 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 14:00:16 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 14:00:16 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 14:00:16 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 14:00:59 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 14:00:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 14:00:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 14:00:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 14:14:20 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 14:14:20 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 14:14:20 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 14:14:20 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 14:14:36 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 14:14:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 14:14:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 14:14:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 14:18:28 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-10-31 14:18:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 14:18:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 14:18:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 14:24:35 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 14:24:35 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 14:24:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 14:24:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 14:25:31 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 14:25:31 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 14:25:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 14:25:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 14:43:30 --- ERROR: Unable to find a route to match the URI: cregistrar/deps.js
2015-10-31 14:43:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 14:43:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 14:43:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 15:37:24 --- ERROR: Unable to find a route to match the URI: home/Terms of Use3.html
2015-10-31 15:37:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 15:37:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 15:37:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 16:08:42 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 16:08:42 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 16:08:42 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 16:08:42 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 16:10:41 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png
2015-10-31 16:10:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 16:10:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 16:10:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 16:10:41 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_217bc0_256x240.png
2015-10-31 16:10:41 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 16:10:41 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 16:10:41 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 16:10:45 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 16:10:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 16:10:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 16:10:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 16:10:45 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_217bc0_256x240.png
2015-10-31 16:10:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 16:10:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 16:10:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 16:16:05 --- ERROR: Unable to find a route to match the URI: cregistrar/deps.js
2015-10-31 16:16:05 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 16:16:05 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 16:16:05 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 16:39:13 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png
2015-10-31 16:39:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 16:39:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 16:39:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 16:39:13 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 16:39:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 16:39:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 16:39:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 16:39:13 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_217bc0_256x240.png
2015-10-31 16:39:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 16:39:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 16:39:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 16:57:13 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 16:57:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 16:57:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 16:57:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 17:07:35 --- ERROR: Unable to find a route to match the URI: reports/5098/order_4838/4838_coep111313002_130981522_APURV_VIVEK_KULKARNI_WL.pdf
2015-10-31 17:07:35 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 17:07:35 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 17:07:35 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 17:11:34 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 17:11:34 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 17:11:34 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 17:11:34 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 17:11:50 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 17:11:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 17:11:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 17:11:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 17:11:56 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 17:11:56 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 17:11:56 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 17:11:56 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 17:12:00 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 17:12:00 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 17:12:00 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 17:12:00 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 17:12:22 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 17:12:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 17:12:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 17:12:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 17:12:47 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 17:12:47 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 17:12:47 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 17:12:47 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 17:33:31 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-10-31 17:33:31 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 17:33:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 17:33:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:23:28 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 18:23:28 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:23:28 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:23:28 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:23:45 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 18:23:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:23:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:23:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:23:50 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 18:23:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:23:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:23:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:23:57 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 18:23:57 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:23:57 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:23:57 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:24:51 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png
2015-10-31 18:24:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:24:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:24:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:24:51 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png
2015-10-31 18:24:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:24:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:24:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:24:51 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png
2015-10-31 18:24:51 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:24:51 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:24:51 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:24:52 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 18:24:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:24:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:24:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:24:52 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-icons_217bc0_256x240.png
2015-10-31 18:24:52 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:24:52 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:24:52 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:25:08 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 18:25:08 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:25:08 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:25:08 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:25:33 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 18:25:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:25:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:25:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:25:37 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 18:25:37 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:25:37 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:25:37 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:26:55 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 18:26:55 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:26:55 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:26:55 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:27:21 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 18:27:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:27:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:27:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:32:49 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 18:32:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:32:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:32:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:37:14 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 18:37:14 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:37:14 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:37:14 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:38:50 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 18:38:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:38:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:38:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:41:36 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 18:41:36 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:41:36 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:41:36 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:46:31 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 18:46:31 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:46:31 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:46:31 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:50:13 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 18:50:13 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:50:13 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:50:13 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:50:18 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 18:50:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:50:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:50:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 18:57:54 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 18:57:54 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 18:57:54 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 18:57:54 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:00:16 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 19:00:16 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:00:16 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:00:16 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:00:21 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 19:00:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:00:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:00:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:03:59 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 19:03:59 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:03:59 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:03:59 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:08:18 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 19:08:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:08:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:08:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:11:24 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 19:11:24 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:11:24 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:11:24 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:11:29 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 19:11:29 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:11:29 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:11:29 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:15:04 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 19:15:04 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:15:04 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:15:04 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:20:22 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 19:20:22 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:20:22 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:20:22 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:25:06 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 19:25:06 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:25:06 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:25:06 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:25:12 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 19:25:12 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:25:12 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:25:12 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:28:21 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 19:28:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:28:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:28:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:30:10 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 19:30:10 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:30:10 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:30:10 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:33:45 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 19:33:45 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:33:45 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:33:45 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 19:33:49 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 19:33:49 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 19:33:49 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 19:33:49 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 20:51:11 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png
2015-10-31 20:51:11 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 20:51:11 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 20:51:11 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 20:58:33 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png
2015-10-31 20:58:33 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 20:58:33 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 20:58:33 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 21:02:43 --- ERROR: Unable to find a route to match the URI: assets/app/css/images/ui-bg_diagonals-thick_20_666666_40x40.png
2015-10-31 21:02:43 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 21:02:43 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 21:02:43 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 21:02:48 --- ERROR: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}}
2015-10-31 21:02:48 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 21:02:48 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 21:02:48 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 21:29:30 --- ERROR: Unable to find a route to match the URI: home/images/btn-close.png
2015-10-31 21:29:30 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 21:29:30 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 21:29:30 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 21:38:50 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-10-31 21:38:50 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 21:38:50 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 21:38:50 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 22:19:21 --- ERROR: Unable to find a route to match the URI: ws/orders.json
2015-10-31 22:19:21 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 22:19:21 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 22:19:21 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 22:32:18 --- ERROR: Unable to find a route to match the URI: robots.txt
2015-10-31 22:32:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 22:32:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 22:32:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 23:14:18 --- ERROR: Unable to find a route to match the URI: home/Terms of Use3.html
2015-10-31 23:14:18 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 23:14:18 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 23:14:18 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-10-31 23:59:26 --- ERROR: Unable to find a route to match the URI: home/js/jquery-1.11.1.js
2015-10-31 23:59:26 --- ERROR: #0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2015-10-31 23:59:26 --- ERROR: Uncaught exception 'ErrorException' with message 'Undefined variable: plugin' in /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php:163
Stack trace:
#0 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 163, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#4 /var/www/html/ayushman/application/classes/controller/cexceptiontemplate.php(39): Kohana_Controller_Template->after()
#5 [internal function]: Controller_Cexceptiontemplate->after()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cerror))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(
2015-10-31 23:59:26 --- ERROR: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}