<?php 
include('connexion.php');
if(isset($_POST['numcni']) and isset($_POST['nom'] )) {
$statement = $db->prepare("UPDATE agent SET NOM = :nom, SEXE = :sexe, PRENOMS = :prenom ,NUMCNI_AGENT=:numcni WHERE NUMCNI_AGENT=:numcni");
$statement -> execute($_POST);
header("location:liste_agent.php");
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="asset/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="asset/css/form.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Electeur</title> 
   <style>
    .couleur_champ:focus{
        border: 1px solid orange;
    }
    .submit{
        background-color: solid orange;
    }
   </style>
</head>
<body style="background:white;">
<nav class="navbar navbar-expand-lg entete" >
    <div class="navbar-collapse">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Se deconnecter</a>
      </li>

    </ul>
  </div>
</nav>


<div class="container prime" >
        <header>
            <h3>Agent</h3>
        </header>
        <?php

$statement = $db->prepare('SELECT * FROM agent WHERE NUMCNI_AGENT=:NUMCNI_AGENT');
$statement->execute($_GET);
$client = $statement->fetch();

?>
       
        <form action="formulaire_inscriptionfm.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>N&deg; CNI</label>
                            <input type="text" placeholder="N&deg; de carte CNI" required name="numcni" id="numcni" class="couleur_champ" value="<?= $client['NUMCNI_AGENT'] ?>">
                        </div>

                        <div class="input-field">
                            <label>Nom</label>
                            <input type="text" placeholder="nom" required name="nom" value="<?= $client['NOM'] ?>" class="couleur_champ">
                        </div>

                        <div class="input-field">
                            <label>Prenoms</label>
                            <input type="text" placeholder="prenoms" required name="prenom" value="<?= $client['PRENOMS'] ?>" class="couleur_champ">
                        </div>
                        <div class="input-field">
                        <label for="sexe">sexe : </label>
                           <select name="sexe" id="sexe"> 
                              
                                            <option <?= ($client['SEXE'] == 'F') ? 'selected' : '' ?>>F</option>
                                            <option <?= ($client['SEXE'] == 'M') ? 'selected' : '' ?>>M</option>
                             </select>
                     </div>
                        <div>

                            <?php

                            if ($client['administrateur'] == "1") {
                                echo '  <input type="checkbox"  name="administrateur" value="1"  checked >
    <label for="drh">Statut Administrateur</label>';
                                echo '<div> 
    <input type="checkbox"  name="administrateur" value="0" >
    <label for="administrateur">Statut Agent</label>
    </div>  ';
                            } else {
                                echo '  <div> <input type="checkbox"  name="administrateur" value="1"  >
    <label for="administrateur">Statut Administrateur</label>';
                                echo '
    <input type="checkbox"  name="administrateur" value="0" checked>
    <label for="administrateur">Statut Agent </label>
    </div>  ';
                            }
                            ?>
                        </div>
                    </div>
                    <button class="sumbit" type="su">
                        <span class="btnText">Valider</span>
                    </button>
                </div>

            </div>

        </form>
    </div>
    <script src="asset/js/md5.js"></script>
    <!-- <script src="asset/js/form.js"></script> -->
    <script>
        let naiss = document.getElementById('naissance');
        naiss.onblur = function() {
            let date = new Date();
            if (naiss.value != '') {
                if (naiss.value.split('-')[0] >= date.getFullYear() - 18) {
                    naiss.value = '';
                    alert('date de naissance invalide')
                }
            }
        }
    </script>
</body>

</html>



 