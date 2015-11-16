<?php


class PageModel {
    public function getById($id)
    {

        if(!isset($id)){
            $id = 1;
        }
        $page = array(
            1 => 'This is home page',
            2 => 'This is about page'
        );
        return $page[$id];
    }

}