<?php
class User extends Main
{
    public function isUser($userName){
        $result = $this->dbQuery("SELECT id FROM users WHERE user_name='$userName'");
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if(isset($user['id'])) return true;
        else return false;
    }

    public function signInUser($userName, $userPassword){
        $result = $this->dbQuery("SELECT id, user_name FROM users WHERE user_name='$userName' AND user_password='$userPassword'");
        $user = $result->fetch(PDO::FETCH_ASSOC);
        var_dump($user);
        if(isset($user['id'])){
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userName'] = $user['user_name'];
            echo('SESSION = '.$_SESSION['userName']);
            Header("Location: ?page=lottery");
        }
    }

    public function signUpUser($userName, $userPassword){
        if(!$this->isUser($userName)){
            $res = $this->dbQuery("INSERT INTO users (user_name, user_password) VALUES (\"$userName\", \"$userPassword\")");
            Header("Location: ?page=lottery");
        }
    }

}