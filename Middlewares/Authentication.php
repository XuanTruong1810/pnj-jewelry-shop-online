<?php

class Middleware
{
    public function AuthenticationAdmin($model)
    {
        $check = $model->GenerateTokenAdmin($_COOKIE['AuthenticationAdmin'] ?? "");
        return $check ? true : false;
    }
}
