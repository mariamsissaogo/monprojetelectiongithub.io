<?php 
//session_start();
include('connexion.php');
$statement = $db->prepare("SELECT * FROM agent");
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
        <a class="nav-link" href="Menu_Agentf.php">Liste des electeurs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Se deconnecter</a>
      </li>

    </ul>
  </div>
</nav>
<div class="container prime" >
<center><h2>LISTE  AGENTS </h2></center>

        <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">Numéro d'ordre</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenoms</th>
                <th scope="col">Numéro CNI</th>
                <th scope="col">Supprimer</th>
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
                    <td><?= $value['NUMCNI_AGENT'] ?></td>
                    <td>
                        <a href='<?= "formulaire_inscriptionsupp.php?NUMCNI_AGENT=" . $value['NUMCNI_AGENT'] ?>' > supprimer<i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a>
                    </td>
                    <td>
                        <a href='<?= "formulaire_inscriptionfm.php?NUMCNI_AGENT=" . $value['NUMCNI_AGENT'] ?>' > Modiffier<i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
    <script src="asset/js/md5.js"></script>
    <script src="asset/js/form.js"></script>
    
</body>
</html>