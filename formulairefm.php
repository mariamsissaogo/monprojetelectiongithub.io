<?php
session_start();
include('connexion.php');
if (isset($_POST['COD_ELECTEUR']) and !empty($_POST['COD_ELECTEUR']) and isset($_POST['nom'])) {
    $statement = $db->prepare("UPDATE electeur SET NOM = :nom, PRENOMS = :prenom, DATENAISS = :naiss, LIEU_VOTE = :lieu_de_vote, NUMERO_ELECTEUR=:numelecteur ,VILLAGE_QUARTIER=:residence ,CONTACT=:contact ,NUM_CNI=:numcni,SEXE=:sexe WHERE COD_ELECTEUR = :COD_ELECTEUR");
    $statement->execute($_POST);
    header("location:liste_electeurm.php");
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
  

    <div class=" navbar-collapse">
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="redirect.php?param=liste_electeur">Liste des electeurs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Se deconnecter</a>
      </li>

    </ul>
  </div>
</nav>


<div class="container prime" >
        <header>
            <h3>Electeur</h3>
        </header>
        <?php

        $statemente = $db->prepare('SELECT * FROM electeur WHERE COD_ELECTEUR=:COD_ELECTEUR');
        $statemente->execute($_GET);
        $client = $statemente->fetch();

        ?>

        <form action="formulairefm.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <div class="fields">
                    <div class="input-field">
                             <label>N&deg; CNI</label>
                            <div class = 'ci'>
                                <input type="text" placeholder="N&deg; de carte CNI" name="numcni" value="<?= $client['NUM_CNI'] ?>" id="numcni" class="couleur_champ">
                            </div>
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
                            <label>date de naissance</label>
                            <input type="date" placeholder="date de naissance" id="naissance" max="2006-01-01" required name="naiss" value="<?= $client['DATENAISS'] ?>" class="couleur_champ">

                        </div>

                        <div class="input-field">
                            <label>Lieu de vote</label>
                            <input type="text" placeholder="Lieu de vote" required name="lieu_de_vote" value="<?= $client['LIEU_VOTE'] ?>" class="couleur_champ">
                        </div>
                        <div class="input-field">
                            <label>N&deg; Electeur</label>
                            <input type="text" placeholder="N&deg; Electeur" name="numelecteur" id="numelecteur" value="<?= $client['NUMERO_ELECTEUR'] ?>" class="couleur_champ">
                        </div>
                        <div class="input-field">
                        <label for="sexe">sexe : </label>
                           <select name="sexe" id="sexe"> 
                              
                                            <option <?= ($client['SEXE'] == 'F') ? 'selected' : '' ?>>F</option>
                                            <option <?= ($client['SEXE'] == 'M') ? 'selected' : '' ?>>M</option>
                             </select>
                       </select>
                     </div>
                        <div class="input-field">
                            <label>Village / quartier</label>
                            <input type="text" placeholder="Village / quartier" name="residence" value="<?= $client['VILLAGE_QUARTIER'] ?>" class="couleur_champ">
                        </div>
                        <div class="input-field">
                            <label>Contact</label>
                            <input type="text" placeholder="Contact" name="contact" value="<?= $client['CONTACT'] ?>" class="couleur_champ">
                        </div>
                        <div class="input-field">
                            <input type="hidden" placeholder="Contact" name="COD_ELECTEUR" value="<?= $client['COD_ELECTEUR'] ?>" class="couleur_champ">
                        </div>

                        <button class="sumbit">
                            <span class="btnText">Valider</span>
                        </button>
                    </div>
                </div>

            </div>

        </form>
    </div>
    <script src="asset/js/md5.js"></script>
    <script src="asset/js/form.js"></script>
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



 