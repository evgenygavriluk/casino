<?php
require_once('classes\Main.php');
require_once('classes\Lottery.php');

if(isset($_POST['try']) && $_POST['try']==1) {
    $prize = new Lottery();
    echo json_encode($prize->getPrize($prize->createLotteryArray()), JSON_UNESCAPED_UNICODE);
}