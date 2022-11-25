<?php 
//session_start();
include('connexion.php');
$statement = $db->prepare("SELECT * FROM agent");
$statement->execute();
$liste_electeur = $statement->fetchAll();
?>

<html>
<head>
</head>

<body>

<center><h2>Listes des superviseurs </h2></center>

        <table class="table table-bordered border-primary" style=" width: auto;">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Numéro CNI</th>
                <th scope="col">Nom & prénoms</th>
                <th scope="col">Sexe</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($liste_electeur as $key => $value) : $i = $i + 1; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $value['NUMCNI_AGENT'] ?></td>
                    <td><?= $value['NOM'] . ' ' . $value['PRENOMS'] ?></td>
                    <td><?= $value['SEXE'] ?></td>
                    
                   
 
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script src="asset/js/md5.js"></script>
    <script src="asset/js/form.js"></script>
    
</body>
</html>