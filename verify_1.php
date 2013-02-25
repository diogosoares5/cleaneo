<?php 
session_start();
require_once("controller/customerController.php");

$uid = $_POST['uid'];
$hash = $_POST['hash'];

$customer = new Customer();
$customer->authUserHash($uid,$hash);
?>