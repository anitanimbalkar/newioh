<?php defined('SYSPATH') or die('No direct script access.'); ?>

2018-03-22 00:25:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 00:25:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 00:25:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 00:25:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 18:19:00 --- ERROR: ErrorException [ 2 ]: Header may not contain more than a single header, new line detected ~ SYSPATH/classes/kohana/http/header.php [ 926 ]
2018-03-22 18:19:00 --- STRACE: ErrorException [ 2 ]: Header may not contain more than a single header, new line detected ~ SYSPATH/classes/kohana/http/header.php [ 926 ]
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
2018-03-22 18:20:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 18:20:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 19:19:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: images/black-transparent.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 19:19:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: images/black-transparent.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 19:20:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 19:20:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 19:21:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 19:21:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: cconsultation/images/ui-bg_highlight-soft_100_eeeeee_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 19:21:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 19:21:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-bg_inset-hard_100_f5f8f9_1x100.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 19:21:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 19:21:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_ffffff_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 19:21:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_217bc0_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 19:21:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/app/css/images/ui-icons_217bc0_256x240.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 22:03:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 22:03:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 23:11:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: ads.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 23:11:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: ads.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-22 23:40:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-22 23:40:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}