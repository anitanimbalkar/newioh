<?php defined('SYSPATH') or die('No direct script access.'); ?>

2018-03-02 05:33:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 05:33:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 05:33:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 05:33:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 11:03:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 11:03:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 11:45:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 11:45:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 11:45:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 11:45:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 13:15:13 --- ERROR: Exception [ 0 ]: exception 'Swift_TransportException' with message 'Connection could not be established with host secure.emailsrvr.com [Permission denied #13]' in /var/www/html/ayushman/modules/email/vendor/swiftmailer/lib/classes/Swift/Transport/StreamBuffer.php:266
Stack trace:
#0 /var/www/html/ayushman/modules/email/vendor/swiftmailer/lib/classes/Swift/Transport/StreamBuffer.php(66): Swift_Transport_StreamBuffer->_establishSocketConnection()
#1 /var/www/html/ayushman/modules/email/vendor/swiftmailer/lib/classes/Swift/Transport/AbstractSmtpTransport.php(117): Swift_Transport_StreamBuffer->initialize(Array)
#2 /var/www/html/ayushman/modules/email/vendor/swiftmailer/lib/classes/Swift/Mailer.php(79): Swift_Transport_AbstractSmtpTransport->start()
#3 /var/www/html/ayushman/modules/email/classes/kohana/email.php(145): Swift_Mailer->send(Object(Swift_Message))
#4 /var/www/html/ayushman/application/classes/controller/cemailsender.php(153): Kohana_Email::send('anitanimbalkar1...', 'inhlth@indiaonl...', 'Registation Pro...', '?? ~ APPPATH/classes/controller/cstaffdirectory.php [ 203 ]
2018-03-02 13:15:13 --- STRACE: Exception [ 0 ]: exception 'Swift_TransportException' with message 'Connection could not be established with host secure.emailsrvr.com [Permission denied #13]' in /var/www/html/ayushman/modules/email/vendor/swiftmailer/lib/classes/Swift/Transport/StreamBuffer.php:266
Stack trace:
#0 /var/www/html/ayushman/modules/email/vendor/swiftmailer/lib/classes/Swift/Transport/StreamBuffer.php(66): Swift_Transport_StreamBuffer->_establishSocketConnection()
#1 /var/www/html/ayushman/modules/email/vendor/swiftmailer/lib/classes/Swift/Transport/AbstractSmtpTransport.php(117): Swift_Transport_StreamBuffer->initialize(Array)
#2 /var/www/html/ayushman/modules/email/vendor/swiftmailer/lib/classes/Swift/Mailer.php(79): Swift_Transport_AbstractSmtpTransport->start()
#3 /var/www/html/ayushman/modules/email/classes/kohana/email.php(145): Swift_Mailer->send(Object(Swift_Message))
#4 /var/www/html/ayushman/application/classes/controller/cemailsender.php(153): Kohana_Email::send('anitanimbalkar1...', 'inhlth@indiaonl...', 'Registation Pro...', '?? ~ APPPATH/classes/controller/cstaffdirectory.php [ 203 ]
--
#0 [internal function]: Controller_Cstaffdirectory->action_addstaff()
#1 /var/www/html/ayushman/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cstaffdirectory))
#2 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#5 {main}
2018-03-02 14:49:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 14:49:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/jsF/jquery.min.map ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 14:53:55 --- ERROR: ErrorException [ 1 ]: Class 'XMLWriter' not found ~ APPPATH/classes/helper/PHPExcel/Shared/XMLWriter.php [ 44 ]
2018-03-02 14:53:55 --- STRACE: ErrorException [ 1 ]: Class 'XMLWriter' not found ~ APPPATH/classes/helper/PHPExcel/Shared/XMLWriter.php [ 44 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2018-03-02 15:09:08 --- ERROR: ErrorException [ 1 ]: Class 'XMLWriter' not found ~ APPPATH/classes/helper/PHPExcel/Shared/XMLWriter.php [ 44 ]
2018-03-02 15:09:08 --- STRACE: ErrorException [ 1 ]: Class 'XMLWriter' not found ~ APPPATH/classes/helper/PHPExcel/Shared/XMLWriter.php [ 44 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2018-03-02 15:16:04 --- ERROR: ErrorException [ 1 ]: Class 'XMLWriter' not found ~ APPPATH/classes/helper/PHPExcel/Shared/XMLWriter.php [ 44 ]
2018-03-02 15:16:04 --- STRACE: ErrorException [ 1 ]: Class 'XMLWriter' not found ~ APPPATH/classes/helper/PHPExcel/Shared/XMLWriter.php [ 44 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2018-03-02 15:21:08 --- ERROR: ErrorException [ 1 ]: Class 'XMLWriter' not found ~ APPPATH/classes/helper/PHPExcel/Shared/XMLWriter.php [ 44 ]
2018-03-02 15:21:08 --- STRACE: ErrorException [ 1 ]: Class 'XMLWriter' not found ~ APPPATH/classes/helper/PHPExcel/Shared/XMLWriter.php [ 44 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2018-03-02 15:45:36 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL phpinfo() was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2018-03-02 15:45:36 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL phpinfo() was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2018-03-02 16:13:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 16:13:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 16:59:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 16:59:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 17:35:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 17:35:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 17:35:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 17:35:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 17:36:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 17:36:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 17:36:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 17:36:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 17:36:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 17:36:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 19:57:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 19:57:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 19:57:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 19:57:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 23:29:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 23:29:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2018-03-02 23:29:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2018-03-02 23:29:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}