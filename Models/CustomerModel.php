<?php

class CustomerModel extends ModelBase
{
    public function GetAll()
    {
        $query = "SELECT * FROM `customer`";
        return $this->Query($query, null)->fetchAll();
    }
}
