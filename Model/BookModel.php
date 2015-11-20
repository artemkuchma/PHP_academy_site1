<?php


class BookModel {




    public  function getList($from, $count)
    {
        $dbc = Connect::getConnection();
        $sql = 'SELECT b.id, b.title, a.name AS author, b.description, b.created FROM books b JOIN authors a ON b.author_id= a.id ORDER BY b.id LIMIT '.$from.' ,'.$count;
        $placeholders = array(); //compact('from', 'count');- гарантирует чтоб ключ совпадал с переменной

        $date = $dbc->getDate($sql, $placeholders);
        return $date;
    }

    public function getBook($id)
    {
        $dbc = Connect::getConnection();
        $sql = 'SELECT b.id, b.title, a.name AS author, b.description, b.created FROM books b JOIN authors a ON b.author_id= a.id WHERE b.id = :id';
        $placeholders = array('id'=> $id);
        $date = $dbc->getDate($sql, $placeholders);
        if(!$date){
            throw new Exception("id = $id ,is not exist", 404);
        }
        //добавить кесепшен if(!$book){throw new Exeption('фигня вышла', 404)}
        /**
        $book1=array('Name'=>'Na1','Author'=>'Au1','Year'=>'1990', 'id'=>10);
        $book2=array('Name'=>'Na2','Author'=>'Au2','Year'=>'1985','Catalog_number'=>'127897', 'id'=> 11);
        $book3=array('Name'=>'Na3','Author'=>'Au3','Year'=>'1999', 'id'=> 12);
        $books=array($book1,$book2,$book3);
        $b = '';
        foreach($books as $key => $val){
            if($val['id']==$id){
                $b=$key;
            }
        } **/

        return $date;

    }



}