<?php defined('SYSPATH') or die('No direct script access.'); ?>

2018-03-21 01:00:10 --- ERROR: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
2018-03-21 01:00:10 --- STRACE: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#1 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#3 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#5 [internal function]: Controller_Cwelcome->action_index()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-03-21 01:13:24 --- ERROR: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
2018-03-21 01:13:24 --- STRACE: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#1 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#3 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#5 [internal function]: Controller_Cwelcome->action_index()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-03-21 01:13:37 --- ERROR: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
2018-03-21 01:13:37 --- STRACE: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#1 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#3 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#5 [internal function]: Controller_Cwelcome->action_index()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-03-21 01:13:43 --- ERROR: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
2018-03-21 01:13:43 --- STRACE: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#1 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#3 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#5 [internal function]: Controller_Cwelcome->action_index()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-03-21 01:13:46 --- ERROR: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
2018-03-21 01:13:46 --- STRACE: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#1 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#3 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#5 [internal function]: Controller_Cwelcome->action_index()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-03-21 01:13:48 --- ERROR: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
2018-03-21 01:13:48 --- STRACE: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#1 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#3 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#5 [internal function]: Controller_Cwelcome->action_index()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-03-21 01:13:58 --- ERROR: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
2018-03-21 01:13:58 --- STRACE: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#1 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#3 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#5 [internal function]: Controller_Cwelcome->action_index()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-03-21 01:14:11 --- ERROR: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
2018-03-21 01:14:11 --- STRACE: Session_Exception [ 1 ]: Error reading session data.[SID:(art5757qrj2ad5mfdtad46qq65), name:session][Deatils: exception 'ErrorException' with message 'session_start(): open(/var/lib/php/session/sess_art5757qrj2ad5mfdtad46qq65, O_RDWR) failed: Permission denied (13)' in /var/www/html/ayushman/system/classes/kohana/session/native.php:43
Stack trace:
#0 [internal function]: Kohana_Core::error_handler(2, 'session_start()...', '/var/www/html/a...', 43, Array)
#1 /var/www/html/ayushman/system/classes/kohana/session/native.php(43): session_start()
#2 /var/www/html/ayushman/system/classes/kohana/session.php(301): Kohana_Session_Native->_read(NULL)
#3 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#4 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#5 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#6 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#7 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#8 [internal function]: Controller_Cwelcome->action_index()
#9 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#10 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#13 {main}]
 ~ SYSPATH/classes/kohana/session.php [ 326 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/session.php(125): Kohana_Session->read(NULL)
#1 /var/www/html/ayushman/system/classes/kohana/session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(57): Kohana_Session::instance('native')
#3 /var/www/html/ayushman/modules/auth/classes/kohana/auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /var/www/html/ayushman/application/classes/controller/cwelcome.php(7): Kohana_Auth::instance()
#5 [internal function]: Controller_Cwelcome->action_index()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cwelcome))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-03-21 01:14:58 --- ERROR: Exception [ 0 ]: Database_Exception [ 1017 ]: Can't find file: './demodata/users.frm' (errno: 13 - Permission denied) [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
2018-03-21 01:14:58 --- STRACE: Exception [ 0 ]: Database_Exception [ 1017 ]: Can't find file: './demodata/users.frm' (errno: 13 - Permission denied) [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
--
#0 [internal function]: Controller_Cuser->action_login()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cuser))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-03-21 01:16:18 --- ERROR: Exception [ 0 ]: Database_Exception [ 1017 ]: Can't find file: './demodata/users.frm' (errno: 13 - Permission denied) [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
2018-03-21 01:16:18 --- STRACE: Exception [ 0 ]: Database_Exception [ 1017 ]: Can't find file: './demodata/users.frm' (errno: 13 - Permission denied) [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
--
#0 [internal function]: Controller_Cuser->action_login()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cuser))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-03-21 01:16:56 --- ERROR: Exception [ 0 ]: Database_Exception [ 1017 ]: Can't find file: './demodata/users.frm' (errno: 13 - Permission denied) [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
2018-03-21 01:16:56 --- STRACE: Exception [ 0 ]: Database_Exception [ 1017 ]: Can't find file: './demodata/users.frm' (errno: 13 - Permission denied) [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
--
#0 [internal function]: Controller_Cuser->action_login()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cuser))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-03-21 01:37:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 01:37:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 01:38:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 01:38:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 02:13:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 02:13:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 02:20:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 02:20:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 03:12:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 03:12:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 05:33:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 05:33:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 07:47:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 07:47:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 12:24:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 12:24:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 13:23:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 13:23:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 13:27:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 13:27:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 13:28:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 13:28:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 13:42:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 13:42:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 13:42:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 13:42:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 13:47:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 13:47:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 13:47:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 13:47:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 19:08:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 19:08:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-21 22:16:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-21 22:16:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}