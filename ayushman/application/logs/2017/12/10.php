<?php defined('SYSPATH') or die('No direct script access.'); ?>

2017-12-10 00:10:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use1.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 00:10:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/Terms of Use1.html ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 00:16:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 00:16:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 01:05:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 01:05:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 03:00:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 03:00:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 07:00:01 --- ERROR: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
2017-12-10 07:00:01 --- STRACE: ErrorException [ 2 ]: include_once(/ayushman/application/classes/helper/notificationsender.php): failed to open stream: No such file or directory ~ APPPATH/classes/controller/cprogrammanager.php [ 2 ]
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
2017-12-10 07:22:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 07:22:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:14:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:14:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:38:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:38:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: data.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: data.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: database.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: database.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: htdocs.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: htdocs.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: htdocs.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: htdocs.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: htdocs.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: htdocs.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: site.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: site.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: htdocs.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: htdocs.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: site.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: site.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: site.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: site.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: site.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: site.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: dump.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: dump.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: dump.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: dump.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: dump.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: dump.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: dump.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: dump.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sql.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sql.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sql.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sql.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sql.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sql.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sql.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: sql.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: mysql.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: mysql.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: mysql.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: mysql.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: mysql.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: mysql.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: mysql.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: mysql.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: base.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: base.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: base.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: base.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: base.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: base.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: base.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: base.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup/backup.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup/backup.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup/backup.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup/backup.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup/backup.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup/backup.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: db.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: db.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup/backup.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: backup/backup.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: db.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: db.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: db.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: db.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: db.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: db.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.com.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.com.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.com.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.com.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.com.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.com.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.com.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.com.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.tar ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: htdocs.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: htdocs.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: indiaonlinehealth.sql ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public_html.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: public_html.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: www.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: www.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: db_backup.sql.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: db_backup.sql.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: web.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: web.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: 1.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: 1.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: archive.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: archive.zip ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 08:53:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: archive.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 08:53:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: archive.tar.gz ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 09:58:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 09:58:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 09:58:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 09:58:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 10:47:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 10:47:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 10:52:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 10:52:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 12:35:20 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL assets/images/smallLogo was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-12-10 12:35:20 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL assets/images/smallLogo was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-12-10 12:48:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 12:48:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 13:57:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 13:57:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 14:57:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 14:57:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 14:57:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 14:57:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 14:57:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 14:57:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 16:44:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 16:44:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 16:50:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: wp-content/uploader.php.suspected ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 16:50:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: wp-content/uploader.php.suspected ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 17:52:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 17:52:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 18:49:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 18:49:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 19:09:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 19:09:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.woff ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 19:09:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 19:09:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/webapp/fonts/flexslider-icon.ttf ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 19:09:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 19:09:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: home/images/favicon-new.png ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 19:54:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 19:54:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 20:40:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 20:40:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 20:55:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 20:55:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}
2017-12-10 23:00:59 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL assets/images/smallLogo was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2017-12-10 23:00:59 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL assets/images/smallLogo was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/ayushman/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/ayushman/system/classes/kohana/request.php(1142): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#3 {main}
2017-12-10 23:00:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
2017-12-10 23:00:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: robots.txt ~ SYSPATH/classes/kohana/request.php [ 1130 ]
--
#0 /var/www/html/ayushman/index.php(109): Kohana_Request->execute()
#1 {main}