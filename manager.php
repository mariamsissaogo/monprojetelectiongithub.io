<?php 
session_start();
include('./connexion.php');
$data = json_decode(file_get_contents('php://input'));

if($data) {
    $var = ($data -> toCheck == 'blazian')? 'NUM_CNI' : 'NUMERO_ELECTEUR';
    $bool = false;
    $req = $db -> query('SELECT NUM_CNI, NUMERO_ELECTEUR FROM electeur');

    while($res = $req -> fetch()) {
        if($data -> param == $res[$var])  $bool = true; break;
    }
    if($bool == true) echo 'in bd';
}

?>
