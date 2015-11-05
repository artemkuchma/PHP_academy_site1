<?php


class IndexController {

    public function indexAction(Request $request){
        return 2;
    }

    public function aboutAction(Request $request){
        $text_about='test, test, test';
        $templateDir=str_replace('Controller', '', __CLASS__);
        $templateFile=VIEW_DIR.$templateDir.DS.'about.phtml';
        ob_start();
        require $templateFile;
        return ob_get_clean();
    }

    public function contactAction(Request $request){
        return 4;
    }

}