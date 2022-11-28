<?php


class UserFunction extends SessionFunction {

    public function CreateUser($userID, $email, $username, $password_encrypt) {
        $Create_user_query = "INSERT INTO `users`(`user_id`, `email`, `username`, `password`) VALUES (:userid, :email, :username, :password);";
        $statement = $this->con->prepare($Create_user_query);
        $statement->bindParam(":userid", $userID, PDO::PARAM_STR);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->bindParam(":username", $username, PDO::PARAM_STR);
        $statement->bindParam(":password", $password_encrypt, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function GetUser($userID) {
        $Get_user_query = "SELECT * FROM `users` WHERE `user_id` = :userid LIMIT 1;";
        $statement = $this->con->prepare($Get_user_query);
        $statement->bindParam(":userid", $userID, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function CheckUser($email, $username) {
        $Get_user_query = "SELECT * FROM `users` WHERE `email` = :email OR `username` = :username;";
        $statement = $this->con->prepare($Get_user_query);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->bindParam(":username", $username, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
    public function LoginUser($username, $password) {
        $Login_query = "SELECT * FROM `users` WHERE `username` = :username;";
        $statement = $this->con->prepare($Login_query);
        $statement->bindParam(":username", $username, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();

        if ($result) {
            for ($i = 0; $i < count($result); $i++) {
                if (password_verify($password, $result[$i]["password"])) {
                    return $result[$i];
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
}