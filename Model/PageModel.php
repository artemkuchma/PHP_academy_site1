<?php


class PageModel {
    public function getById($id)
    {
        $page = array(
            1 => 'This is home page',
            2 => 'This is about page'
        );
        return $page[$id];
    }

}