<?php 
include('connexion.php');

$data = json_decode(file_get_contents('php://input'));

$req =  $db -> prepare('SELECT * FROM electeur WHERE sexe=:sexe   ORDER BY NOM ASC');

$req -> execute(array(':sexe' => $data -> sexe));

while ($res = $req -> fetch(PDO::FETCH_OBJ)) {
    print_r(json_encode($res));
}
               

?>