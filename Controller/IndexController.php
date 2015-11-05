<?php


class IndexController extends Controller
{

    public function indexAction(Request $request)
    {

        $args = array(
            'test' => 256
        );
        return $this->render('index', $args);
    }

    public function aboutAction(Request $request)
    {
        $text_about = 'test, test, test';
        $templateDir = str_replace('Controller', '', __CLASS__);
        $templateFile = VIEW_DIR . $templateDir . DS . 'about.phtml';
        if (!file_exists($templateFile)) {
            die("{$templateFile} not found");
        }
        ob_start();
        require $templateFile;
        return ob_get_clean();
    }

    public function contactAction(Request $request)
    {
        $args = array(
            'test_contact' => 'contact-test',
            'test_2'=> 'test-2'
        );
        return $this->render('contact', $args);
    }

}