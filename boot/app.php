<?php
require_once __DIR__.'/../vendor/autoload.php';

// Timezone
date_default_timezone_set('Etc/UTC'); // Europe/Wasraw

// Erors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

// Execution time (unlimited)
set_time_limit(0);

// Session
ini_set('session.gc_maxlifetime', 3600);

session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'domain' => '.'.$_SERVER["HTTP_HOST"],
    'secure' => isset($_SERVER["HTTPS"]),
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

// Charset
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

// Router global
global $router;
?>