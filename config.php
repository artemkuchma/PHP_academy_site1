<?php

define('DS',DIRECTORY_SEPARATOR);

define('ROOT', __DIR__.DS);
define('VIEW_DIR', ROOT.'View'.DS);
define('MODEL_DIR', ROOT.'Model'.DS);
define('CONTROLLER_DIR', ROOT.'Controller'.DS);
define('LIB_DIR', ROOT.'Library'.DS);

$host = 'test1.ua';
$dbname = 'db_site1';
$user ='root';
$pass = '';

define('DSN', "mysql:host=$host;dbname=$dbname; charset=UTF8");
define('USER', $user);
define('PASS', $pass);
// db - user: db_site1 ; password: DW7JZXAvL4WtyU6e
define('BOOKS_PER_PAGE', 5);
?>
