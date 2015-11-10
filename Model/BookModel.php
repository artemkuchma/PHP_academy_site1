<?php


class BookModel {



    public  function getList()
    {
        $book1=array('Name'=>'Na1','Author'=>'Au1','Year'=>'1990', 'id'=>10);
        $book2=array('Name'=>'Na2','Author'=>'Au2','Year'=>'1985','Catalog_number'=>'127897', 'id'=> 11);
        $book3=array('Name'=>'Na3','Author'=>'Au3','Year'=>'1999', 'id'=> 12);
        $books=array($book1,$book2,$book3);
        return $books;
    }

    public function getBook($id)
    {
        $book1=array('Name'=>'Na1','Author'=>'Au1','Year'=>'1990', 'id'=>10);
        $book2=array('Name'=>'Na2','Author'=>'Au2','Year'=>'1985','Catalog_number'=>'127897', 'id'=> 11);
        $book3=array('Name'=>'Na3','Author'=>'Au3','Year'=>'1999', 'id'=> 12);
        $books=array($book1,$book2,$book3);
        $b = '';
        foreach($books as $key => $val){
            if($val['id']==$id){
                $b=$key;
            }
        }
        return $books[$b];

    }



}