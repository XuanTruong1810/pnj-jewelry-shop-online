<?php

class Middleware
{
    public static function Authentication()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login.php');
            exit();
        }
    }
}
