<?php defined('SYSPATH') or die('No direct script access.'); ?>

2017-10-20 01:33:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 01:33:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 02:13:47 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL a was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-10-20 02:13:47 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL a was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-10-20 02:49:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 02:49:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 03:33:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 03:33:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 03:48:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 03:48:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 04:18:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 04:18:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 04:28:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 04:28:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 05:30:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 05:30:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 06:27:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 06:27:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 07:00:01 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
2017-10-20 07:00:01 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
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
2017-10-20 07:21:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 07:21:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 08:24:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 08:24:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 09:53:54 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16013' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 09:53:54 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16013' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 09:54:18 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16014' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 09:54:18 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16014' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 09:54:38 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16015' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 09:54:38 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16015' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 10:30:50 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16016' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 10:30:50 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16016' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 10:30:50 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16017' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 10:30:50 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16017' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 10:30:56 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16018' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 10:30:56 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16018' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 10:30:57 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16019' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 10:30:57 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16019' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 10:30:59 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16020' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 10:30:59 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16020' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 10:31:01 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16021' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 10:31:01 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16021' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 10:31:52 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16022' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 10:31:52 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16022' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 10:31:54 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16023' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 10:31:54 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16023' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 10:32:01 --- ERROR: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16024' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
2017-10-20 10:32:01 --- STRACE: ErrorException [ 2 ]: shell_exec(): Unable to execute 'echo 'php /var/www/html/ayushman/index.php --uri=csms/generatesms/16024' | at Now 2&gt;&amp;1' ~ APPPATH/classes/helper/asynchronusprocesses.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'shell_exec(): U...', '/var/www/html/a...', 19, Array)
#1 /var/www/html/ayushman/application/classes/helper/asynchronusprocesses.php(19): shell_exec('echo 'php /var/...')
#2 /var/www/html/ayushman/application/classes/helper/notificationsender.php(9): helper_asynchronusprocesses->sendnotificationnow(Array)
#3 /var/www/html/ayushman/application/classes/controller/cayushusers.php(54): helper_notificationsender::sendnotification(Array)
#4 [internal function]: Controller_Cayushusers->action_reset()
#5 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cayushusers))
#6 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#9 {main}
2017-10-20 11:22:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 11:22:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 11:39:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 11:39:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 11:39:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 11:39:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/js/jquery-1.11.1.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/js/jquery-1.11.1.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 14:50:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 14:50:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:14:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:14:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:14:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:14:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:14:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:14:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:14:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:14:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:14:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:14:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:14:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:14:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:14:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:14:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:14:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:14:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:14:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:14:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:14:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:14:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:30:56 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2017-10-20 15:35:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 15:35:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 15:35:09 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2017-10-20 16:36:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 16:36:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 16:41:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 16:41:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 16:41:14 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2017-10-20 16:46:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 16:46:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 16:46:44 --- ERROR: ErrorException [ 2 ]: session_write_close(): write failed: No space left on device (28) ~ SYSPATH/classes/kohana/session/native.php [ 68 ]
2017-10-20 17:22:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 17:22:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-10-20 17:27:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-10-20 17:27:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unabl