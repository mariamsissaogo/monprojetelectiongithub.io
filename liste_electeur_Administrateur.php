<?php
//session_start();
include('connexion.php');
$statement = $db->prepare("SELECT * FROM electeur");
$statement->execute();
$liste_electeur = $statement->fetchAll();
?>

<!-- <html>
<head> -->

<link rel="stylesheet" href="asset/css/sb-admin-2.min.css">
<!-- </head> -->

<body style="background:white;">

    <center>
        <h3>LISTE ELECTEURS </h3>
    </center>
    <table class="table table-bordered border-primary"  style=" width: auto;">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Num&eacute;ro CNI</th>
                <th scope="col">Nom & Prénoms</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Contact</th>
                <th scope="col">Quartier/Village</th>
                <th scope="col">Lieu de vote</th>
                <th scope="col">Sexe</th>


            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($liste_electeur as $key => $value) : $i = $i + 1; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $value['NUM_CNI'] ?></td>
                    <td><?= $value['NOM'] . ' ' . $value['PRENOMS'] ?></td>
                    <td ><?= date("d/m/Y", strtotime($value['DATENAISS']))  ?></td>
                    <td><?= $value['CONTACT'] ?></td>
                    <td><?= $value['VILLAGE_QUARTIER'] ?></td>
                    <td><?= $value['LIEU_VOTE'] ?></td>
                    <td><?= $value['SEXE'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script src="asset/js/md5.js"></script>
    <script src="asset/js/form.js"></script>
    
</body>
</html>