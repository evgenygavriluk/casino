<?php
//$user = new User();

if(isset($_POST['userName']) && isset($_POST['userPassword']) && isset($_POST['signUpButton'])){
    $user->signUpUser(htmlspecialchars($_POST['userName']), htmlspecialchars($_POST['userPassword']));
}
require_once('template/signup_template.php');