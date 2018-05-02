<?php defined('SYSPATH') or die('No direct script access.'); ?>

2018-02-19 07:46:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 07:46:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 07:46:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 07:46:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 09:33:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 09:33:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 12:39:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 12:39:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 12:40:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 12:40:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 12:40:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 12:40:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 13:08:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 13:08:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 13:08:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_female_doctor.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 13:08:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_female_doctor.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 13:08:51 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
2018-02-19 13:08:51 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
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
2018-02-19 13:59:01 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-19 13:59:01 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-19 15:34:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 15:34:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 15:34:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_female_doctor.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 15:34:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_female_doctor.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 15:34:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 15:34:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 15:41:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 15:41:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 15:49:21 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
2018-02-19 15:49:21 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'Database_Exception [ 1055 ]: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.orderedtests.createdon_c' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `orderedtestbypatients` AS `orderedtestbypatient` WHERE `patientuserid` = '8754' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
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
2018-02-19 15:49:33 --- ERROR: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` = 'completed' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2018-02-19 15:49:33 --- STRACE: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` = 'completed' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
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
2018-02-19 15:51:19 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-19 15:51:19 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-19 15:51:26 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-19 15:51:26 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-19 15:51:28 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-19 15:51:28 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-19 15:51:30 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-19 15:51:30 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-19 15:51:41 --- ERROR: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
2018-02-19 15:51:41 --- STRACE: Exception [ 0 ]: Database_Exception [ 3065 ]: Expression #1 of ORDER BY clause is not in SELECT list, references column 'demodata.address.city_c' which is not in SELECT list; this is incompatible with DISTINCT [ SELECT `doctorcity`.* FROM `doctorcities` AS `doctorcity` ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cdoctordirectory.php [ 287 ]
--
#0 /var/www/html/ayushman/application/classes/controller/cdoctordirectory.php(9): Controller_Cdoctordirectory->displayfavoritedoctors('', Array)
#1 [internal function]: Controller_Cdoctordirectory->action_view()
#2 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cdoctordirectory))
#3 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#6 {main}
2018-02-19 15:51:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_3846viewImage.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 15:51:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_3846viewImage.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 15:52:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_3846viewImage.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 15:52:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_3846viewImage.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 15:52:51 --- ERROR: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: HTTP_REFERER' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:294
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(294): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 294, Array)
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#2 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#3 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main}' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#2 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#3 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#4 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#7 {main} ~ APPPATH/classes/controller/cpatientrequistiontests.php [ 196 ]
2018-02-19 15:52:51 --- STRACE: Exception [ 0 ]: exception 'Exception' with message 'exception 'ErrorException' with message 'Undefined index: HTTP_REFERER' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:294
Stack trace:
#0 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(294): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/a...', 294, Array)
#1 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(34): Controller_Cpatientrequistiontests->displaytestlist('vpatientrequist...')
#2 /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php(15): Controller_Cpatientrequistiontests->displaytestlistFootable('vpatientrequist...', 'order')
#3 [internal function]: Controller_Cpatientrequistiontests->action_viewFootable()
#4 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cpatientrequistiontests))
#5 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#8 {main}' in /var/www/html/ayushman/application/classes/controller/cpatientrequistiontests.php:362
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
2018-02-19 16:08:13 --- ERROR: Exception [ 0 ]: Database_Exception [ 1364 ]: Field 'Firstname_c' doesn't have a default value [ INSERT INTO `users` (`username`, `password`, `email`) VALUES ('sugarnimbalkar', '2971be60341fd331b94e4e953ca5470e5d2adc9394dd6e0c06468b58f7888dbc', 'anita.nimbalkar@indiaonlinehealth.com') ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cregistrar.php [ 222 ]
2018-02-19 16:08:13 --- STRACE: Exception [ 0 ]: Database_Exception [ 1364 ]: Field 'Firstname_c' doesn't have a default value [ INSERT INTO `users` (`username`, `password`, `email`) VALUES ('sugarnimbalkar', '2971be60341fd331b94e4e953ca5470e5d2adc9394dd6e0c06468b58f7888dbc', 'anita.nimbalkar@indiaonlinehealth.com') ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cregistrar.php [ 222 ]
--
#0 [internal function]: Controller_Cregistrar->action_register()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cregistrar))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-02-19 16:11:24 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL sqlbuddy was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2018-02-19 16:11:24 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL sqlbuddy was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2018-02-19 16:18:56 --- ERROR: Exception [ 0 ]: Database_Exception [ 1364 ]: Field 'Firstname_c' doesn't have a default value [ INSERT INTO `users` (`username`, `password`, `email`) VALUES ('sugarnimbalkar', '2971be60341fd331b94e4e953ca5470e5d2adc9394dd6e0c06468b58f7888dbc', 'anita.nimbalkar@indiaonlinehealth.com') ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cregistrar.php [ 222 ]
2018-02-19 16:18:56 --- STRACE: Exception [ 0 ]: Database_Exception [ 1364 ]: Field 'Firstname_c' doesn't have a default value [ INSERT INTO `users` (`username`, `password`, `email`) VALUES ('sugarnimbalkar', '2971be60341fd331b94e4e953ca5470e5d2adc9394dd6e0c06468b58f7888dbc', 'anita.nimbalkar@indiaonlinehealth.com') ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ] ~ APPPATH/classes/controller/cregistrar.php [ 222 ]
--
#0 [internal function]: Controller_Cregistrar->action_register()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cregistrar))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-02-19 16:29:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 16:29:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 17:22:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 17:22:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-19 17:22:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_female_doctor.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-19 17:22:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_female_doctor.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}