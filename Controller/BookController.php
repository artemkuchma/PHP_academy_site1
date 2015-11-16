<?php


class BookController extends Controller {

    public function indexAction(Request $request) {
        $bookModel = new BookModel();
        $books=$bookModel->getList();

       $args=array('books'=>$books);
        return $this->render('index', $args);
    }

    public function showAction(Request $request)
    {
        $bookModel = new BookModel();
        $b = $bookModel->getBook($request->get('id'));
        $book = $b[0];
        $args = array(
            'book'=>$book,
            'id'=>$request->get('id')
        );
        return $this->render('book', $args);

    }

}