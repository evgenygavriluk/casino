<?php
//$user = new User();

if(isset($_POST['userName']) && isset($_POST['userPassword']) && isset($_POST['signInButton'])){
    $user->signInUser(htmlspecialchars($_POST['userName']), htmlspecialchars($_POST['userPassword']));
}
require_once('template/auth_template.php');