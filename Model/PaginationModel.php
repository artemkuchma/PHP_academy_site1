<?php


class PaginationModel
{
    public $itemsCount;
    public $itemsPerPage;

    public function getItemsCount()
    {
        $dbc = Connect::getConnection();
        $sql ='SELECT count(*) AS itemsCount FROM books';
        $placeholders = array();
        return $this->itemsCount = $dbc->getDate($sql, $placeholders);
    }
    public function getItemsPerPage()
    {
        $this->itemsPerPage = 5;
        return $this->itemsPerPage;
    }


}
