<?php

class CustomerModel extends ModelBase
{
    public function GetAll()
    {
        $query = "SELECT * FROM `customer`";
        return $this->Query($query, null)->fetchAll();
    }
    public function AddCustomer($name, $phoneNumber, $address, $email)
    {
        if (empty($address)) {
            $address = null;
        }
        $query = "SELECT `CUSTOMERID` FROM `customer` WHERE `PHONENUMBER` = ?";
        $existingCustomer = $this->Query($query, [$phoneNumber])->fetch(PDO::FETCH_ASSOC);
        if ($existingCustomer) {
            $customerId = $existingCustomer['CUSTOMERID'];
        } else {
            $insertQuery = "INSERT INTO `customer`(`CUSTOMERID`,`CUSTOMERNAME`, `PHONENUMBER`, `ADDRESS`, `EMAIL`)
                        VALUES (?,?,?,?,?)";
            $uuid = uniqid();
            $this->Query($insertQuery, [$uuid, $name, $phoneNumber, $address, $email]);
            $customerId = $uuid;
        }
        return  $customerId;
    }
}
