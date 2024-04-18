<?php

class CategoryModel extends ModelBase
{
    public function GetCategory()
    {
        $query = "SELECT cad.CATEGORY_ATTRIBUTES_DETAILID,cad.CATEGORY_ATTRIBUTES_DETAILNAME,
        cad.CATEGORY_ATTRIBUTEID, ca.CATEGORY_ATTRIBUTENAME from category_attributes_detail as
        cad JOIN category_attributes as ca on ca.CATEGORY_ATTRIBUTEID = cad.CATEGORY_ATTRIBUTEID;";
        return $this->Query($query, null)->fetchAll();
    }
}
