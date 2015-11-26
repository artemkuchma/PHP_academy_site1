<?php


class IndexController extends Controller
{

    public function pageAction(Request $request)
    {
        $pageModel = new PageModel();
        $pageText = $pageModel->getById($request->get('id'));
        $log = $this->render('log');

        $args = array(
            'text' => array($pageText),
            'id' => $request->get('id'),
            'log'=> $log
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
        $msg = $request->get('msg');

        if ($request->isPost()) {
            if ($form->isValid()) {
                $this->redirect('/index.php?rout=index/contact&id=3&msg=Сообщение отправленно');
                $form->saveToDb();
                mail('ts@test.com', 'HELLOW', $form->name . PHP_EOL . $form->email . PHP_EOL . $form->message. PHP_EOL. $form->date);
                $form->name = '';
                $form->email = '';
                $form->message = '';
            }else{
                $msg = 'Fail!!!';
            }
        }
        $args = array(
            'form' => $form,
            'msg' => $msg
        );


        return $this->render('contact', $args);
    }

    public function registerAction(Request $request)
    {
        $registerForm = new RegisterModel($request);
        $msg = $request->get('msg');
        if($request->isPost()){
            if($registerForm->isValid()){

                if($registerForm->isUserExist()){
                    $registerForm->insertIntoDB();
                    $this->redirect("index.php?rout=index/page&id=1&msg=Вы успешно зарегистрировались");
                }
                else{
                    $msg = 'Such user already exists!';
                }

            }
            else {
                $msg = $registerForm->passwordMath()? 'Please fill in fields' : 'Passwords don\'t match';
            }
        }
        $args = array(
            'registerForm' => $registerForm,
            'msg' => $msg
        );
        return $this->render('register', $args);
    }

    public function loginAction(Request $request)
    {
        $msg = $request->get('msg');
        $login = new LoginModel($request);
        if($request->isPost()){
            if($login->isValid()){
                if($login->getUser()){
                    $user = array(
                        'user'=>$login->getUser()[0]['username'],
                        'id'=>$login->getUser()[0]['id']
                    );
                    Session::set('user',$user);
                    //$msg = 'ok';

                    $this->redirect("index.php?id=1&msg=You have been logged in");


                }
                else{
                    $msg = 'You are not registered.<a href="index.php?rout=index/register&id=5">Register</a>';
                }
            }
            else{
                $msg = 'Please fill in fields ';
            }
        }

        $args = array(
            'login' => $login,
            'msg' => $msg
        );
        return $this->render('login', $args);
    }
    public function logoutAction($key='user')
    {
        //$key = null ?$key = Session::get('user')['user']:$key;
        Session::remove($key);
        Session::destroy();
        $this->redirect("index.php?id=1&msg=You are logout");
    }

    public function errorAction(Exception $e)
    {
        $message = $e->getCode() . ' : ' . $e->getMessage();
        $args['message'] = $message;
        return $this->render('error', $args);
    }




}