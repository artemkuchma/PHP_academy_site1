<?php


class BookController extends Controller {

    public function indexAction(Request $request) {
        //$paginationModel = new PaginationModel();
        //$count = $paginationModel->getItemsPerPage();
        $from = $request->get('page') ? BOOKS_PER_PAGE*$request->get('page')- BOOKS_PER_PAGE : 0;

        $bookModel = new BookModel();
        $books=$bookModel->getList($from, BOOKS_PER_PAGE);

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
    public function getPagination()
    {

        $request = new Request();
        $bookModel =new BookModel();
        $itemsCount = $bookModel->getBooksCount();
        $itemsPerPage = BOOKS_PER_PAGE;
        $currentPage =  $request->get('page')? (int)$request->get('page'):1;
        if($currentPage<0){
            throw new Exception('Bad request' , 400);
        }
        $pagination = new Pagination($currentPage, $itemsCount, $itemsPerPage);
        $args['pagination'] = $pagination->buttons;
            return $this->render('pagination', $args);

        //Debugger::PrintR($args);



    }

}