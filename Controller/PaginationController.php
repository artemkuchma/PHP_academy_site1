<?php


class PaginationController extends Controller {
    public $buttons = array();
    public function __construct()
    {
        $request = new Request();
        $currentPage = $request->get('page') ? (int)$request->get('page') : 1;// get('page') ? (int)get('page'): 1 ;
        $paginationModel = new PaginationModel();
        $itemsCount = $paginationModel->getItemsCount()[0]['itemsCount'];
        $itemsPerPage = $paginationModel->getItemsPerPage();


        if(!$currentPage){
            return;
        }
        $pageCount = ceil($itemsCount/$itemsPerPage);
        if($pageCount ==1){
            return;
        }
        if($currentPage>$pageCount){
            $currentPage = $pageCount;
        }
        $this->buttons[] = new Battons($currentPage-1, $currentPage>1, 'Previous');

        for($i=1; $i<=$pageCount; $i++){
            $isActive = $currentPage != $i;
            $this->buttons[] = new Battons($i, $isActive);
        }

        $this->buttons[] = new Battons($currentPage+1, $currentPage < $pageCount, 'Next');

    }
    public  function showPagination()
    {
        $p = new self;
        $args['pagination'] = $p->buttons;

      //  ob_start();
       // $pagination->buttons;
       // ob_get_clean();
        return $this->render('pagination', $args);
    }


}