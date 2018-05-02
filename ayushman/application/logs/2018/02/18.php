<?php defined('SYSPATH') or die('No direct script access.'); ?>

2018-02-18 00:46:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/cssF/footable.core.bootstrap.min.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 00:46:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/cssF/footable.core.bootstrap.min.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:03:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/help_new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:03:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/help_new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:03:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/feedback-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:03:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/feedback-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:03:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/logout.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:03:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/images/logout.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:03:39 --- ERROR: ErrorException [ 8 ]: Undefined variable: result ~ APPPATH/views/vuser/vpatient/vpatientdashboard.php [ 177 ]
2018-02-18 01:03:39 --- STRACE: ErrorException [ 8 ]: Undefined variable: result ~ APPPATH/views/vuser/vpatient/vpatientdashboard.php [ 177 ]
--
#0 /var/www/html/ayushman/application/views/vuser/vpatient/vpatientdashboard.php(177): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/a...', 177, Array)
#1 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#2 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#3 /var/www/html/ayushman/system/classes/kohana/view.php(228): Kohana_View->render()
#4 /var/www/html/ayushman/application/views/vtemplates/vblanktemplate.php(112): Kohana_View->__toString()
#5 /var/www/html/ayushman/system/classes/kohana/view.php(61): include('/var/www/html/a...')
#6 /var/www/html/ayushman/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/a...', Array)
#7 /var/www/html/ayushman/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#8 /var/www/html/ayushman/application/classes/controller/ctemplatewithmenu.php(167): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Ctemplatewithmenu->after()
#10 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Cpatientdashboard))
#11 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#13 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#14 {main}
2018-02-18 01:03:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/cssF/footable.core.bootstrap.min.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:03:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/cssF/footable.core.bootstrap.min.css ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:25:01 --- ERROR: Exception [ 0 ]: Database_Exception [ 2 ]: mysql_connect(): Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
2018-02-18 01:25:01 --- STRACE: Exception [ 0 ]: Database_Exception [ 2 ]: mysql_connect(): Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH/database/classes/kohana/database/mysql.php [ 67 ] ~ APPPATH/classes/controller/cuser.php [ 47 ]
--
#0 [internal function]: Controller_Cuser->action_login()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cuser))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-02-18 01:43:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:43:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:44:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:44:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:50:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:50:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:51:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:51:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:52:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:52:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:56:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:56:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 01:57:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 01:57:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 02:03:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 02:03:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 02:07:01 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
2018-02-18 02:07:01 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#1 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-18 02:07:49 --- ERROR: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` != 'cancelled' AND `status` != 'completed' AND `status` != 'reassign' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2018-02-18 02:07:49 --- STRACE: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` != 'cancelled' AND `status` != 'completed' AND `status` != 'reassign' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT COUNT(*)...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(1484): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(282): Kohana_ORM->count_all()
#3 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(205): Model_Xjqgridgetdata->getdatafrmdb('count_all', Object(Model_Patientmedicine), '[patientuserid,...', '', '', '', '', '')
#4 /var/www/html/ayushman/application/classes/controller/cpatientmedicinesorder.php(1002): Model_Xjqgridgetdata->getfootablejsondata('', '', 'refchemistorder...', 'desc', 'patientmedicine', 'date,patientuse...', '[patientuserid,...', '')
#5 [internal function]: Controller_Cpatientmedicinesorder->action_viewFootable()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientmedicinesorder))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-02-18 02:08:30 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: bp' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:744
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
2018-02-18 02:08:30 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: bp' in /var/www/html/ayushman/application/classes/controller/cnewtracksheet.php:744
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
2018-02-18 02:09:02 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-18 02:09:02 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-18 02:09:10 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-18 02:09:10 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-18 02:09:55 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
2018-02-18 02:09:55 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#1 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-18 02:15:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_3846viewImage.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 02:15:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_3846viewImage.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 02:16:03 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-18 02:16:03 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-18 02:16:27 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-18 02:16:27 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-18 02:16:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_3846viewImage.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 02:16:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_3846viewImage.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 02:24:07 --- ERROR: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` = 'completed' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2018-02-18 02:24:07 --- STRACE: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` = 'completed' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT COUNT(*)...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(1484): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(282): Kohana_ORM->count_all()
#3 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(205): Model_Xjqgridgetdata->getdatafrmdb('count_all', Object(Model_Patientmedicine), '[patientuserid,...', '', '', '', '', '')
#4 /var/www/html/ayushman/application/classes/controller/cpatientmedicinesorder.php(1040): Model_Xjqgridgetdata->getfootablejsondata('', '', 'refchemistorder...', 'desc', 'patientmedicine', 'deliverydate,pa...', '[patientuserid,...', '')
#5 [internal function]: Controller_Cpatientmedicinesorder->action_viewmedicinecompleteorderFootable()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientmedicinesorder))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-02-18 02:24:14 --- ERROR: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` = 'completed' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2018-02-18 02:24:14 --- STRACE: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` = 'completed' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT COUNT(*)...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(1484): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(282): Kohana_ORM->count_all()
#3 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(205): Model_Xjqgridgetdata->getdatafrmdb('count_all', Object(Model_Patientmedicine), '[patientuserid,...', '', '', '', '', '')
#4 /var/www/html/ayushman/application/classes/controller/cpatientmedicinesorder.php(1040): Model_Xjqgridgetdata->getfootablejsondata('', '', 'refchemistorder...', 'desc', 'patientmedicine', 'deliverydate,pa...', '[patientuserid,...', '')
#5 [internal function]: Controller_Cpatientmedicinesorder->action_viewmedicinecompleteorderFootable()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientmedicinesorder))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-02-18 02:24:46 --- ERROR: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` = 'completed' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2018-02-18 02:24:46 --- STRACE: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` = 'completed' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT COUNT(*)...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(1484): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(282): Kohana_ORM->count_all()
#3 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(205): Model_Xjqgridgetdata->getdatafrmdb('count_all', Object(Model_Patientmedicine), '[patientuserid,...', '', '', '', '', '')
#4 /var/www/html/ayushman/application/classes/controller/cpatientmedicinesorder.php(1040): Model_Xjqgridgetdata->getfootablejsondata('', '', 'refchemistorder...', 'desc', 'patientmedicine', 'deliverydate,pa...', '[patientuserid,...', '')
#5 [internal function]: Controller_Cpatientmedicinesorder->action_viewmedicinecompleteorderFootable()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientmedicinesorder))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-02-18 02:25:09 --- ERROR: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` != 'cancelled' AND `status` != 'completed' AND `status` != 'reassign' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2018-02-18 02:25:09 --- STRACE: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` != 'cancelled' AND `status` != 'completed' AND `status` != 'reassign' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/ayushman/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT COUNT(*)...', false, Array)
#1 /var/www/html/ayushman/modules/orm/classes/kohana/orm.php(1484): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(282): Kohana_ORM->count_all()
#3 /var/www/html/ayushman/application/classes/model/xjqgridgetdata.php(205): Model_Xjqgridgetdata->getdatafrmdb('count_all', Object(Model_Patientmedicine), '[patientuserid,...', '', '', '', '', '')
#4 /var/www/html/ayushman/application/classes/controller/cpatientmedicinesorder.php(1002): Model_Xjqgridgetdata->getfootablejsondata('', '', 'refchemistorder...', 'desc', 'patientmedicine', 'date,patientuse...', '[patientuserid,...', '')
#5 [internal function]: Controller_Cpatientmedicinesorder->action_viewFootable()
#6 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientmedicinesorder))
#7 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#10 {main}
2018-02-18 02:25:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 02:25:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 02:46:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 02:46:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 14:04:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 14:04:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 14:04:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 14:04:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 15:06:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 15:06:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 15:06:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 15:06:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 15:06:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 15:06:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 17:38:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 17:38:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 17:38:46 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
2018-02-18 17:38:46 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#1 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-18 17:39:59 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-18 17:39:59 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-18 17:41:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 17:41:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 18:50:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-18 18:50:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-18 19:18:12 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
2018-02-18 19:18:12 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#1 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}