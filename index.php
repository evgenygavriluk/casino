<?php
require_once('classes\Main.php');
require_once('classes\User.php');

session_start();

$user = new User();
// Определяем какую страницу мы отображаем
if(isset($_GET['page'])){
	$page = $_GET['page'];
	require_once($page.".php");
}
else{
    require_once('auth.php');
}
?>
