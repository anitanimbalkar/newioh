<?php defined('SYSPATH') or die('No direct script access.'); ?>

2016-12-09 00:20:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 00:20:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 02:29:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 02:29:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 04:18:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 04:18:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 08:20:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 08:20:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 08:36:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/fancybox/source/'+href+' ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 08:36:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/fancybox/source/'+href+' ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 12:08:09 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:08:09 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:08:10 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:08:10 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:08:21 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:08:21 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:08:22 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:08:22 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:08:29 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:08:29 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:08:30 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:08:30 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:12:34 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:12:34 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:12:35 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:12:35 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:12:38 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:12:38 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:12:39 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:12:39 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:12:44 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:12:44 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:12:45 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:12:45 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:12:51 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:12:51 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:12:52 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:12:52 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:49:27 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:49:27 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:49:28 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:49:28 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:49:41 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:49:41 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:49:42 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:49:42 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:50:08 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:50:08 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 12:50:09 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
2016-12-09 12:50:09 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: Cholesterol' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:696
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(696): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 696, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:734
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(186): Controller_Cnewtracksheet->arrange_trackerdata(Array, '20448', NULL, 'Not_provided', '2833')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 258 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2016-12-09 14:27:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 14:27:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 14:27:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: .well-known/assetlinks.json ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 14:27:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: .well-known/assetlinks.json ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 16:16:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 16:16:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 17:08:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 17:08:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 17:14:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 17:14:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 17:15:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 17:15:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 17:16:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use3.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 17:16:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use3.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 17:16:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 17:16:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 17:16:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 17:16:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 17:40:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 17:40:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 18:41:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 18:41:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 21:55:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: .well-known/apple-app-site-association ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 21:55:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: .well-known/apple-app-site-association ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 21:59:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: ws/orders.json ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 21:59:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: ws/orders.json ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 22:04:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 22:04:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 22:51:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.shtmlrobots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 22:51:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/index.shtmlrobots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 22:52:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/about.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 22:52:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/about.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 22:52:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/disclaimer.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 22:52:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/disclaimer.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 22:52:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/returnpolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 22:52:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/returnpolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 22:52:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/mission.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 22:52:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/mission.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 22:52:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/termsofuse.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 22:52:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/termsofuse.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 22:52:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/privacypolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 22:52:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/privacypolicy.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2016-12-09 23:59:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2016-12-09 23:59:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}