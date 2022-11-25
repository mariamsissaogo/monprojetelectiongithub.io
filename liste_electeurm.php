<?php 
 session_start();
include('connexion.php');
$statement = $db->prepare("SELECT * FROM electeur WHERE  NUMCNI_AGENT = '".$_SESSION['user']['NUMCNI_AGENT']."' ORDER BY COD_ELECTEUR DESC");
$statement->execute();
$liste_electeur = $statement->fetchAll();
?>

<html>
<head>

<link rel="stylesheet" href="asset/css/sb-admin-2.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg entete" >
  <button class="navbar-toggler toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
    <div class="collapse navbar-collapse">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="liste_electeur.php">Liste des electeurs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Se deconnecter</a>
      </li>

    </ul>
  </div>
</nav>

<center><h3>LISTE ELECTEURS </h3></center9>
    <table class="table table-bordered border-primary container prime" id="first"  >
        <thead>
            <tr>
                <th scope="col">Numéro d'ordre</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenoms</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Quartier/Village</th>
                <th scope="col">Lieu de vote</th>
                <th scope="col">Num&eacute;ro CNI</th>
                <th scope="col">Num&eacute;ro électeur</th>
                <th scope="col">Contact</th>
                <th scope="col">Modiffier</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($liste_electeur as $key => $value) : $i = $i + 1; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $value['NOM'] ?></td>
                    <td><?= $value['PRENOMS'] ?></td>
                    <td ><?= date("d/m/Y", strtotime($value['DATENAISS']))  ?></td>
                    <td><?= $value['VILLAGE_QUARTIER'] ?></td>
                    <td><?= $value['LIEU_VOTE'] ?></td>
                    <td><?= $value['NUM_CNI'] ?></td>
                    <td><?= $value['NUMERO_ELECTEUR'] ?></td>
                    <td><?= $value['CONTACT'] ?></td>
                    <td>
                        <a href='<?= "formulairefm.php?COD_ELECTEUR=" . $value['COD_ELECTEUR'] ?>' > Modiffier<i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
         
           
           
        </tbody>
    </table>
</div>
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.min.js"> </script>

</body>

</html>