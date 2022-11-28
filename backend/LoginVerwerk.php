<?php

// import required classes 
require "../Database/session.php"; 
require "../Database/usertable.php"; 
$user = new UserFunction;

//check if submitted
if (isset($_POST["submit"])) {
    //check for token
    if (isset($_SESSION["token"]) && $_SESSION["token"] = $_POST["csrf_token"]) {
        //check if input is empty
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            //create variables
            $username = $_POST['username'];
            $password = $_POST['password'];
            $Login = $user->LoginUser($username, $password);

            //check if user can login
            if ($Login == NULL) {
                $_SESSION["error"] = "<p class='t-red'>Username / Password is incorrect</p>";
                header("Location: /JellyfishJordy2/user/login.php");
            }
            else {
                $_SESSION["UserID"] = $Login["user_id"];
                $_SESSION["error"] = "";
                header("Location: /JellyfishJordy2/");
            }
        }
        else {
            $_SESSION["error"] = "<p class='t-red'>Niet alles is ingevuld</p>";
        }
    }
    else {
        $_SESSION["error"] = "<p class='t-red'>stop hacking me you fuck</p>";
    }
}
else {
    $_SESSION["error"] = "";
}