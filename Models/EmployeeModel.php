<?php

class EmployeeModel extends ModelBase
{
    public function GetAll()
    {
        $query = "SELECT * FROM `employee`";
        return $this->Query($query, null)->fetchAll();
    }
    public function RemoveEmployee($id)
    {
        $query = "DELETE FROM `employee` WHERE EMPLOYEEID = ?";
        return $this->Query($query, [$id]);
    }
    public function UpdateSalary($id, $SALARY)
    {
        $query = "UPDATE `employee` SET SALARY = ? WHERE EMPLOYEEID = ?";
        return $this->Query($query, [$SALARY, $id]);
    }
}
