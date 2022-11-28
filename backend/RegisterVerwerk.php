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
        if (!empty($_POST['email']) && $_POST['username'] && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {
            $userID = $user->CreateID();
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $password_encrypt = password_hash($password, PASSWORD_DEFAULT);
            $patroon_wachtwoord = "/(?=.*[^\w])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}/";
            $databaseCheck = $user->CheckUser($email, $username);

            // check if email is valid inputs
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["error"] = "<p class='t-red'>Invalid E-mail</p>";
                header("Location: ../user/register.php");
            }
            else {
                // check if passwords are valid inputs
                if(!preg_match($patroon_wachtwoord, $password)){
                    $_SESSION["error"] = "<p class='t-red'>Password should have 8 characters or more. At least 1 capital letter, 1 number and 1 symbol (like !@#$^)</p>";
                    header("Location: ../user/register.php");
                }
                else {
                    if($password != $password_confirm) {
                        $_SESSION["error"] = "<p class='t-red'>Please confirm password</p>";
                        header("Location: ../user/register.php");
                    }
                    else {
                        // check if user already exist in database
                        if ($databaseCheck[0]['email'] === $email || $databaseCheck[0]['username'] === $username ){
                            if ($databaseCheck[0]['email'] === $email) {
                                $_SESSION["error"] = "<p class='t-red'>user with this email already exist</p>";
                                header("Location: ../user/register.php");
                            }
                            else if ($databaseCheck[0]['username'] === $username) {
                                $_SESSION["error"] = "<p class='t-red'>user with this username already exist</p>";
                                header("Location: ../user/register.php");
                            }
                        }
                        else {
                            $user->CreateUser($userID, $email, $username, $password_encrypt);
                            $_SESSION["UserID"] = $userID;
                            $_SESSION["error"] = "";
                            header("Location: ../index.php");
                        }
                    }
                }
            }
        }
        else {
            $_SESSION["error"] = "<p class='t-red'>Niet alles is ingevuld</p>";
            header("Location: ../user/register.php");
        }
    }
    else {
        $_SESSION["error"] = "<p class='t-red'>stop hacking me you fuck</p>";
        header("Location: ../user/register.php");
    }
}
else {
    $_SESSION["error"] = "";
}

