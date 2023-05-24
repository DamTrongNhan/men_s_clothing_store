<?php
include_once "../lib/database.php";
include_once "../classes/addOrder.php";
$addOrder = new addOrder();
$_POST = json_decode(array_keys($_POST)[0], true);

$uName  =   str_replace("_", " ", $_POST['uName']);
$uEmail =   str_replace("_", " ", $_POST['uEmail']);
$uPhone =   str_replace("_", " ", $_POST['uPhone']);
$uAddress =   str_replace("_", " ", $_POST['uAddress']);

$uPro =  $_POST['uPro'];
$uDis =  $_POST['uDis'];
$uWar =  $_POST['uWar'];

$insertItemToOrder = $addOrder->addToOrder(
    $uName,
    $uEmail,
    $uPhone,
    $uAddress,
    $uPro,
    $uDis,
    $uWar
);
if ($insertItemToOrder) {
    echo true;
    exit;
}
echo 0;
