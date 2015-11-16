<?php
require 'config.php';
/**
function files_tree($dir, $file)
{
$files_dir_all = scandir($dir);
$files_dir = array();
$t=array();

foreach ($files_dir_all as $val) {
if (strpos($val, '.') !== 0) {
$files_dir[] = $val;

}
}

foreach ($files_dir as$key => $val) {
// if ($val == $file) {
//   return 7;
// break;
//}

if (is_dir($val)) {

$t[$val]=files_tree($val, $file);
//$t[]=$val;
}
else{
$t[$val]=$key;
}

}
//return 'file not found';
return($t);
}
echo'<pre>';
print_r(files_tree(ROOT, 'layout.phtml')) ;
echo'</pre>';
 **/
/*
function __autoload($className)
{
    $file = $className . '.php';
    $constant_dir = array(VIEW_DIR, MODEL_DIR, CONTROLLER_DIR, LIB_DIR);
    foreach ($constant_dir as $val) {
        if (file_exists($val . $file)) {
            require $val . $file;
        }
        else{
            throw new Exception('File {$file} not found');
            //die('Ups');
        }
    }
}*/

function __autoload($className)
{
    $file = $className . '.php';
    if (file_exists(LIB_DIR . $file)) {
        require LIB_DIR . $file;
    } elseif (file_exists(CONTROLLER_DIR . $file)) {
        require CONTROLLER_DIR . $file;
    } elseif (file_exists(VIEW_DIR . $file)) {
        require VIEW_DIR . $file;
    }elseif (file_exists(MODEL_DIR . $file)) {
        require MODEL_DIR . $file;
    }
    else {
        throw new Exception("File {$file} not found", 404);
    }

}

try {
    $request = new Request();
    $rout = $request->get('rout');
    $id= $request->get('id');

    if (!isset($rout)) {
        $rout = 'index/page';
    }

//echo $rout;
    $rout = explode('/', $rout);
//print_r($rout);
    $_controller = ucfirst(strtolower($rout[0])) . 'Controller';
//echo $_controller;
    $_action = strtolower($rout[1]) . 'Action';
//echo $_action;
    $_controller = new $_controller;
    if (!method_exists($_controller, $_action)) {
        throw new Exception("{$_action} not found", 404);
    }
    $content = $_controller->$_action($request).'<br/> <b> page id = '.$id.'</b>';


} catch (Exception $e) {
     //$content=$e->getMessage();
    $indexController = new IndexController();
    $content = $indexController->errorAction($e);
}
require VIEW_DIR . 'layout.phtml';
