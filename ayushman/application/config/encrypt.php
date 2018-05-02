
<?php defined('SYSPATH') or die('No direct script access.');
// application/config/encrypt.php
 
return array(
 
    'default' => array(
        'key'    => 'trwQwVXX96TIJoKxyBHB9AJkwAOHixuV1ENZmIWyanI0j1zNgSVvqywy044Agaj',
        'cipher' => MCRYPT_RIJNDAEL_128,
        'mode'   => MCRYPT_MODE_NOFB,
    ),
    'blowfish' => array(
        'key'    => '7bZJJkmNrelj5NaKoY6h6rMSRSmeUlJuTeOd5HHka5XknyMX4uGSfeVolTz4IYy',
        'cipher' => MCRYPT_BLOWFISH,
        'mode'   => MCRYPT_MODE_ECB,
    ),
    'tripledes' => array(
        'key'    => 'a9hcSLRvA3LkFc7EJgxXIKQuz1ec91J7P6WNq1IaxMZp4CTj5m31gZLARLxI1jD',
        'cipher' => MCRYPT_3DES,
        'mode'   => MCRYPT_MODE_CBC,
    ),
);