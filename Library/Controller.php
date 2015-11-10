<?php


abstract class Controller {
    protected  function render($tplName,array $args=array()){
        extract($args);
        $tplDir=str_replace('Controller', '', get_class($this));
        $file=VIEW_DIR.$tplDir.DS.$tplName.'.phtml';
        if(!file_exists($file)){
            throw new Exception("{$file} not found", 404);
        }
        ob_start();
        require $file;
        return ob_get_clean();
    }

}