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
        $args = array(
            't_1' => 'test-1',
            't_2' => 'test-2',
            't_3' => 'test-3'
        );
        return $this->render('about', $args);


    }

    public function contactAction(Request $request)
    {
        $args = array(
            'test_contact' => 'contact-test',
            'test_2' => 'test-2'
        );
        return $this->render('contact', $args);
    }

    public function errorAction(Exception $e)
    {
        $message = $e->getMessage();
        $args['message'] = $message;
        return $this->render('error', $args);
    }

}