<?php
session_start();
require_once("controller/customerController.php");

$login = $_POST['login'];
$pass = $_POST['pass'];

$customer = new Customer();

if(isset($_GET['out'])):
$customer->logout();
else:
$customer->login($login,$pass);
endif;


?>