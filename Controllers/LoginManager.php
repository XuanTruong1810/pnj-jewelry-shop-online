<?php

class LoginManager extends ControllerBase
{
    public function index()
    {
        $this->View('Login', "Admin");
    }
}
