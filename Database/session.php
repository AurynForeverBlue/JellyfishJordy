<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class SessionFunction {

    private $username = "root";
    private $password = "";
    public $con;

    public function __construct() {
        $this->con = new PDO("mysql:host=localhost; dbname=jellyfishjordy", $this->username, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function CreateID() {
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        $id = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        
        $_SESSION["token"] = $id;
        return $id;
    }

    public function loginCheck() {
        // Check if logged in
        if(!isset($_SESSION["UserID"])) {
            header('Location: /JellyfishJordy2/user/login.php');
        }
    }

    public function logout() {
        $_SESSION["UserID"] = '';
        session_destroy();
        header("Location: /JellyfishJordy2/user/login.php");
    }
}


?>