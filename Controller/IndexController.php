<?php


class IndexController extends Controller
{

    public function pageAction(Request $request)
    {
        $pageModel = new PageModel();
        $pageText = $pageModel->getById($request->get('id'));

        $args = array(
            'text' => array($pageText),
            'id' => $request->get('id')
        );
        return $this->render('page', $args);
    }



    /*
        public function aboutAction(Request $request)
        {
            $args = array(
                't_1' => 'test-1',
                't_2' => 'test-2',
                't_3' => 'test-3'
            );
            return $this->render('about', $args);


        } */

    public function contactAction(Request $request)
    {
        $form = new ContactModel($request);

        if ($request->isPost()) {
            if ($form->isValid()) {
                mail('ts@test.com', 'HELLOW', $form->name . PHP_EOL . $form->email . PHP_EOL . $form->message);
                $form->name = '';
                $form->email = '';
                $form->message = '';
            }
        }
        $args = array(
            'form' => $form,
        );


        return $this->render('contact', $args);
    }

    public function errorAction(Exception $e)
    {
        $message = $e->getCode() . ' : ' . $e->getMessage();
        $args['message'] = $message;
        return $this->render('error', $args);
    }


}