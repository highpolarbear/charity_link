<?php 
/* 
Code required to initialise any webpage.
*/
ob_start(); // output buffering
             
// Display error messages (if any), instead of a white screen
// It should not harm codeenvy users but it should assist while 
// programming on a local machine.
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);

// Path names used through out project
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');
define("CLASSES_PATH", SHARED_PATH . '/classes');

// For dynamically finding URLs
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once('functions.php');
require_once('database.php');
require_once('validation_functions.php');
require_once('status_error_functions.php');
require_once('classes/databaseobject.class.php');
require_once('classes/charityevent.class.php');
require_once('classes/user.class.php');
require_once('classes/session.class.php');
/*
// -> All classes in directory
foreach(glob('classes/*.class.php') as $file) {
require_once($file);
}

// Autoload class definitions
function my_autoload($class) {
if(preg_match('/\A\w+\Z/', $class)) {
    include(CLASSES_PATH.'/' . $class . '.class.php');
}
}
spl_autoload_register('my_autoload');
*/
$db = db_connect();
DatabaseObject::set_database($db);

$session = new Session;
?>