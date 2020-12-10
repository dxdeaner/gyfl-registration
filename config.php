<?php
//echo '<br>Config 01<br>';
/**
	All config variables
*/
define('GYFL_VERSION', 1.1);
define('GYFL_ADMINEMAIL', 'danny@gyflflag.com');

$docRoot = getenv("DOCUMENT_ROOT");
define('GYFL_DOCROOT',$docRoot); //$docRoot = getenv("DOCUMENT_ROOT"); echo $docRoot;
$_SESSION['docroot'] = GYFL_DOCROOT;

//DATABASING

define('GYFL_DBHOST', 'localhost');
define('GYFL_USER', '');
define('GYFL_PASS', '');
define('GYFL_DBNAME', 'sureawmp_gyfl');


/**
//ASSETS
define('SUPER6_DIRASSETS', '/apache3/supersix.me/assets');
define('SUPER6_CSSLIB', 'css/library.css');
define('SUPER6_CSS', 'css/style.css');
define('S6LOGO_FOOTER', '<span class="blue logo">Super</span><span class="orange logo">Six</span>');

//ERRLOR LOGGING
define('SUPER6_DISPLAY_ERRORS', true);
define('SUPER6_LOG_ERRORS', true);
define('SUPER6_ERRORLOG_LOCATION', 'temp/php-errors.log');
*/
