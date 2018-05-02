<?php defined('SYSPATH') or die('No direct script access.'); ?>

2018-02-20 09:57:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 09:57:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 12:18:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 12:18:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 12:18:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 12:18:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 12:28:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 12:28:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 12:28:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_female_doctor.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 12:28:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_female_doctor.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 14:26:58 --- ERROR: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` != 'cancelled' AND `status` != 'completed' AND `status` != 'reassign' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2018-02-20 14:26:58 --- STRACE: Database_Exception [ 1055 ]: Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'demodata.patients.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by [ SELECT COUNT(*) AS `records_found` FROM `patientmedicines` AS `patientmedicine` WHERE `patientuserid` = '8754' AND `status` != 'cancelled' AND `status` != 'completed' AND `status` != 'reassign' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
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
2018-02-20 15:23:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_3846viewImage.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 15:23:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_3846viewImage.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 15:24:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 15:24:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 15:24:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_female_doctor.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 15:24:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/userphotos/thumb_female_doctor.jpg ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 16:05:11 --- ERROR: ErrorException [ 2 ]: Header may not contain more than a single header, new line detected ~ SYSPATH/classes/kohana/http/header.php [ 926 ]
2018-02-20 16:05:11 --- STRACE: ErrorException [ 2 ]: Header may not contain more than a single header, new line detected ~ SYSPATH/classes/kohana/http/header.php [ 926 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'Header may not ...', '/var/www/html/a...', 926, Array)
#1 /var/www/html/ayushman/system/classes/kohana/http/header.php(926): header('Location: http:...', false)
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
2018-02-20 16:07:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 16:07:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 16:07:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 16:07:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cpatienthistorybookapp/{{currentDoctordata.photo}} ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 22:06:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 22:06:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 22:19:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 22:19:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-02-20 22:19:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-02-20 22:19:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}