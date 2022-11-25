<?php
session_start();
// die(var_dump($_SESSION['page']));

if(isset($_SESSION['page'])) include($_SESSION['page']);
?>