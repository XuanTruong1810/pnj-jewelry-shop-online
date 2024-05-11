<?php
require_once '.\vendor\autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Authentication extends ModelBase
{
    public function LoginAdmin($userName, $password)
    {
        $queryCheckUserName = "SELECT * FROM `admin` WHERE `USERNAME` = ?";
        $username = $this->Query(query: $queryCheckUserName, values: [$userName])->rowCount();
        if ($username > 0) {
            $password_hash = md5($password);
            $queryCheckPassword = "SELECT * FROM `ADMIN` WHERE `USERNAME` = ? AND `PASSWORD` = ?";
            $result = $this->Query(query: $queryCheckPassword, values: [$userName, $password_hash])->fetchObject();
            if ($result) {
                $payload = [
                    "AdminID" => $result->AdminID,
                    "Username" => $userName
                ];
                $token = JWT::encode($payload, "XuanTruongKey", 'HS256');
                return $token;
            } else {
                echo "Login thất bại";
            }
        } else {
            echo "Tài khoản không tồn tại";
        }
    }
    public function GenerateTokenAdmin($token)
    {
        if ($token) {
            $decoded = JWT::decode($token, new Key("XuanTruongKey", 'HS256'));
            $query = "SELECT * FROM  `admin` WHERE AdminID = ? ";
            $result = $this->Query($query, [$decoded->AdminID]);
            if ($result) {
                return $decoded;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
