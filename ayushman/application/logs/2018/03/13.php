<?php defined('SYSPATH') or die('No direct script access.'); ?>

2018-03-13 00:49:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 00:49:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 03:25:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 03:25:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 04:04:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 04:04:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 09:20:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 09:20:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 11:09:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 11:09:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 11:14:31 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: bp' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:744
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(744): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 744, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:790
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
2018-03-13 11:14:31 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: bp' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:744
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(744): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 744, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:790
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-03-13 11:17:02 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: bp' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:744
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(744): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 744, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:790
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
2018-03-13 11:17:02 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: bp' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:744
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(744): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 744, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:790
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-03-13 11:21:58 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: bp' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:744
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(744): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 744, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:790
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
2018-03-13 11:21:58 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: bp' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:744
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(744): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 744, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:790
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-03-13 12:28:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 12:28:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 12:29:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 12:29:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cregistrar/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 12:30:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use3.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 12:30:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use3.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 12:30:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 12:30:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpasswordmanager/Thanku.shtml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 12:55:51 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: bp' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:744
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(744): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 744, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:790
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
2018-03-13 12:55:51 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: bp' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:744
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(744): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 744, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:790
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(188): Controller_Cnewtracksheet->arrange_trackerdata(Array, '8754', NULL, 'Not_provided', '518', 0)
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
--
#0 [internal function]: Controller_Cnewtracksheet->action_patientview()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-03-13 12:59:15 --- ERROR: Session_Exception [ 1 ]: Error reading session data.[SID:(kq2rfadjjuqi5jfkeuh4giu5a6), name:session][Deatils: exception 'ErrorException' with message 'session_start(): ps_files_cleanup_dir: opendir(/var/lib/php/session) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(8, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/application/classes/controller/ctemplatewithmenu.php(25): Kohana_Session::instance()
#6 [internal function]: Controller_Ctemplatewithmenu->before()
#7 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#8 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#11 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
2018-03-13 12:59:15 --- STRACE: Session_Exception [ 1 ]: Error reading session data.[SID:(kq2rfadjjuqi5jfkeuh4giu5a6), name:session][Deatils: exception 'ErrorException' with message 'session_start(): ps_files_cleanup_dir: opendir(/var/lib/php/session) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(8, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/application/classes/controller/ctemplatewithmenu.php(25): Kohana_Session::instance()
#6 [internal function]: Controller_Ctemplatewithmenu->before()
#7 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#8 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#11 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#1 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /var/www/html/ayushman/application/classes/controller/ctemplatewithmenu.php(25): Kohana_Session::instance()
#3 [internal function]: Controller_Ctemplatewithmenu->before()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main}
2018-03-13 12:59:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_658IMG-20150906-WA0002.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 12:59:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_658IMG-20150906-WA0002.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 13:03:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 13:03:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 14:56:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 14:56:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 15:05:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 15:05:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 15:56:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 15:56:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 19:55:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 19:55:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 19:55:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sitemap.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 19:55:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sitemap.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 19:56:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use3.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 19:56:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use3.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 19:56:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: ads.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 19:56:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: ads.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-13 22:44:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-13 22:44:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}