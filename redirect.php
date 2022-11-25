<?php
session_start();
// die(var_dump($_GET['param']));

if(isset($_GET['param'])) $_SESSION['page'] = $_GET['param'].'.php';
// die(var_dump($_SESSION['page']));

header('location:index1.php');
// header('location: ./');

?>