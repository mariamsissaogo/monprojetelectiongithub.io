<?php 
include('connexion.php');

$data = json_decode(file_get_contents('php://input'));

$req =  $db -> prepare('SELECT * FROM electeur WHERE NUMCNI_AGENT=:agent   ORDER BY NOM ASC');

$req -> execute(array(':agent' => $data -> agent));

while ($res = $req -> fetch(PDO::FETCH_OBJ)) {
    print_r(json_encode($res));
}             
?>