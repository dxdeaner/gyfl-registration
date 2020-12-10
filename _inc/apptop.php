<?php
//error_reporting(E_ALL);
session_start();

//echo '<br>AppTop 01';
// Session-IZE all $_REQUEST variables.  ($_REQUEST = $_GET + $_POST + $_COOKIE)

foreach($_REQUEST as $postkey => $postval){
	$_SESSION[$postkey] = $postval;
}
//echo '<br>AppTop 02';
$docRoot = getenv("DOCUMENT_ROOT");
if(!is_file($docRoot.'/config.php')) {
	echo('<br>Missing Config File');
}
require($docRoot.'/config.php');

//echo '<br>' . $_SESSION['docroot'];

//echo '<br>AppTop 03';
/**
TODO 
	- ERRORS HANDLER
	- ALERT HANDLER
	- SESSIONS
	- HELPERS
*/

//echo '<br>AppTop 04';

//require('_functions/func.sessions.php');
require($_SESSION['docroot'].'/_inc/_functions/func.dbconnect.php');

require($_SESSION['docroot'].'/_inc/_functions/func.common.php');
//echo '<br>AppTop 05';
require($_SESSION['docroot'].'/_inc/_functions/func.dbfetch.php');
//echo '<br>AppTop 06';
require($_SESSION['docroot'].'/_inc/_functions/func.dupecheck.php');
//echo '<br>AppTop 06';
require($_SESSION['docroot'].'/_inc/_functions/func.dbinsert.php');
//echo '<br>AppTop 07';
require($_SESSION['docroot'].'/_inc/_functions/func.dbedit.php');
//require('_functions/func.errors.php');
require($_SESSION['docroot'].'/_inc/_functions/func.alerts.php');
require($_SESSION['docroot'].'/_inc/_functions/func.notification.php');
//echo '<br>AppTop 08';
require($_SESSION['docroot'].'/_inc/dbgr.php');
//require('_functions/func.printarray.php');
//echo '<br>AppTop 09';
/**
//only allow IPs from Danny and Marc
$ip_allow = array('68.104.224.111', '173.10.26.241', '173.65.182.45');
if(!in_array($_SERVER['REMOTE_ADDR'], $ip_allow)){
	die("you do not belong here!");	
}
*/
