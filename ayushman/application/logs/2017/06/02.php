<?php defined('SYSPATH') or die('No direct script access.'); ?>

2017-06-02 03:21:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 03:21:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 07:00:01 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
2017-06-02 07:00:01 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
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
2017-06-02 09:04:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 09:04:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 10:37:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 10:37:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 10:39:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 10:39:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 10:39:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sitemap.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 10:39:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sitemap.xml ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:03:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:03:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:03:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:03:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:21:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:21:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:21:02 --- ERROR: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('313')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('313')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
2017-06-02 11:21:02 --- STRACE: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('313')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('313')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('313')
#1 [internal function]: Controller_Cconsultation->action_getmyclinics()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-06-02 11:21:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:21:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:21:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:21:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_glass_100_f6f6f6_1x400.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:21:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:21:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_75_ffe45c_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:21:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:21:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:21:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:21:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:29:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:29:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:30:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:30:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:30:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:30:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:30:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:30:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:30:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:30:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:32:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:32:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:36:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:36:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:36:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:36:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:44:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:44:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:44:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:44:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:46:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:46:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:46:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:46:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:46:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:46:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:50:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:50:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:50:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:50:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:50:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:50:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:50:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:50:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:50:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:50:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 11:54:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 11:54:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 12:12:22 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined offset: 1' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:822
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(822): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 822, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:866
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
2017-06-02 12:12:22 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined offset: 1' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:822
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(822): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 822, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:866
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
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
2017-06-02 12:22:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/205_20082012174922.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 12:22:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/205_20082012174922.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 12:27:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/205_20082012174922.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 12:27:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/205_20082012174922.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 12:29:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/205_20082012174922.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 12:29:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/205_20082012174922.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 12:33:57 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:822
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(822): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 822, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:866
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
2017-06-02 12:33:57 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:822
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(822): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 822, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:866
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
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
2017-06-02 12:46:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 12:46:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 12:46:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 12:46:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 12:48:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 12:48:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 12:49:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-warning.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 12:49:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-warning.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:01:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:01:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:02:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:02:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:09:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:09:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:09:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:09:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:09:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:09:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:14:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:14:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:15:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:15:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:15:34 --- ERROR: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('57')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('57')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
2017-06-02 13:15:34 --- STRACE: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('57')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('57')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('57')
#1 [internal function]: Controller_Cconsultation->action_getmyclinics()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-06-02 13:15:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:15:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:16:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:16:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:17:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:17:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:17:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:17:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:20:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:20:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:21:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-warning.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:21:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-warning.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:22:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:22:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:23:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:23:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:30:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:30:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:30:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:30:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 13:43:52 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined offset: 3' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:822
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(822): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 822, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:866
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
#1 [internal function]: Controller_Cnewtracksheet->action_patientview()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main} ~ APPPATH/classes/controller/cnewtracksheet.php [ 261 ]
2017-06-02 13:43:52 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined offset: 3' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:822
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(822): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 822, Array)
#1 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
#2 [internal function]: Controller_Cnewtracksheet->action_patientview()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cnewtracksheet))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main}' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:866
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php(230): Controller_Cnewtracksheet->update_tracker_values('3043', Array, Array, '17342')
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
2017-06-02 13:45:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/201_15082012192348.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 13:45:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/201_15082012192348.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 14:03:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 14:03:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 14:47:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 14:47:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 14:47:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 14:47:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 14:52:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 14:52:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-notes.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 14:56:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 14:56:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 15:16:41 --- ERROR: ErrorException [ 2 ]: Header may not contain more than a single header, new line detected ~ SYSPATH/classes/kohana/http/header.php [ 926 ]
2017-06-02 15:16:41 --- STRACE: ErrorException [ 2 ]: Header may not contain more than a single header, new line detected ~ SYSPATH/classes/kohana/http/header.php [ 926 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'Header may not ...', '/var/www/html/a...', 926, Array)
#1 /var/www/html/ayushman/system/classes/kohana/http/header.php(926): header('Location: https...', false)
#2 /var/www/html/ayushman/system/classes/kohana/http/header.php(893): Kohana_HTTP_Header->_send_headers_to_php(Array, false)
#3 /var/www/html/ayushman/system/classes/kohana/response.php(358): Kohana_HTTP_Header->send_headers(Object(Response), false, NULL)
#4 /var/www/html/ayushman/system/classes/kohana/request.php(960): Kohana_Response->send_headers()
#5 /var/www/html/ayushman/application/classes/controller/cplancomponent.php(242): Kohana_Request->redirect('cplanselector/s...')
#6 [internal function]: Controller_Cplancomponent->action_apply()
#7 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cplancomponent))
#8 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#11 {main}
2017-06-02 16:31:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 16:31:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 16:31:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 16:31:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 16:31:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 16:31:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 18:40:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 18:40:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 18:40:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 18:40:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/js/jquery.watermark.js,Mjm.R6a1EjS0B_.js+livevalidation_standalone.compressed.js,Mjm.wbVNispCET.js+messagecomponent.js,Mjm.YgT5hN5XsZ.js+isd,_deps.js ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 18:40:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 18:40:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/arrow_back.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 18:41:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 18:41:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/img/icon-edit-delete.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 18:41:13 --- ERROR: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('57')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('57')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
2017-06-02 18:41:13 --- STRACE: Exception [ 0 ]: exception 'ErrorException' with message 'Undefined offset: 2' in /var/www/html/ayushman/application/classes/model/user.php:167
Stack trace:
#0 /var/www/html/ayushman/application/classes/model/user.php(167): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/html/a...', 167, Array)
#1 /var/www/html/ayushman/application/classes/model/doctoractiveclinic.php(11): Model_User->get_info('57')
#2 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('57')
#3 [internal function]: Controller_Cconsultation->action_getmyclinics()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main} ~ APPPATH/classes/model/doctoractiveclinic.php [ 32 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cconsultation.php(297): Model_Doctoractiveclinic->get('57')
#1 [internal function]: Controller_Cconsultation->action_getmyclinics()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cconsultation))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2017-06-02 18:41:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 18:41:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 18:43:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 18:43:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].header}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 18:43:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 18:43:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{appointment_info.PatientPhoto}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 18:43:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 18:43:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].signature}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 18:43:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 18:43:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/{{myprofile['userinfo'].footer}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 19:44:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 19:44:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-06-02 19:59:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-06-02 19:59:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}