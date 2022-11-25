<?php 
$user = 'root';
$mdp = '';
try {
    $db = new PDO('mysql:host=localhost;dbname=election', $user, $mdp);
} catch (\Throwable $th) {
    //throw $th;
}

?>