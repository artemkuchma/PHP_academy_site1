<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Art
 * Date: 04.11.15
 * Time: 8:29
 * To change this template use File | Settings | File Templates.
 */

class BookController extends Controller {
    public function indexAction(Request $request) {
        $bookModel = new BookModel();
        $books=$bookModel->getList();

       $args=array('books'=>$books);
        return $this->render('index', $args);
    }

}