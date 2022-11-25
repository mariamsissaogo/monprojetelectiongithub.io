<?php 
session_start();

if(!isset($_SESSION['user'])) header('Location: ./index.php');
include('connexion.php');
if(isset($_POST['numcni']) and isset($_POST['nom'] )) {


   if(empty($_POST['numcni'])){

    $con = $db -> prepare('INSERT INTO electeur VALUE(NULL,?,?,?,?,?,?,?,?,?,?)');
    $con -> execute(array($_SESSION['user']['NUMCNI_AGENT'] , $_POST['numcni'], $_POST['nom'],
                    $_POST['prenom'], $_POST['naiss'], $_POST['sexe'], $_POST['lieu_de_vote'],
                    $_POST['numelecteur'], $_POST['contact'], $_POST['residence']));
    $statement = $db->prepare("SELECT  COD_ELECTEUR FROM electeur  order by COD_ELECTEUR desc LIMIT 1 ");
    $statement->execute();
    $infos = $statement->fetch();
    // die(var_dump($infos));
    $statemen = $db->prepare("UPDATE electeur SET NUM_CNI ='".$infos['COD_ELECTEUR']."' WHERE COD_ELECTEUR = '".$infos['COD_ELECTEUR']."'");
    $statemen->execute();


                 
}else{
    $con = $db -> prepare('INSERT INTO electeur VALUE(NULL,?,?,?,?,?,?,?,?,?,?)');
    $con -> execute(array($_SESSION['user']['NUMCNI_AGENT'] , $_POST['numcni'], $_POST['nom'],
                    $_POST['prenom'], $_POST['naiss'], $_POST['sexe'], $_POST['lieu_de_vote'],
                    $_POST['numelecteur'], $_POST['contact'], $_POST['residence']));
}
   header("location:formulaire.php");
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
    <link rel="stylesheet" href="s.css">
     
    <!----===== Iconscout CSS ===== -->
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
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
      <li class="nav-item active">
        <a class="nav-link" href="redirect.php?param=liste_electeur">Liste des electeurs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Se deconnecter</a>
      </li>

    </ul>
  </div>
</nav>


 
    <div class="container prime">
        <header><h3>Electeur</h3></header>
        <form action="./formulaire.php" method="POST">
        <div class="form first">
                <div class="details personal">
                    <div class="fields">
                    <div class="input-field">
                             <label>N&deg; CNI</label>
                            <div class = 'ci'>
                                <input type="text" placeholder="N&deg; de carte CNI" name="numcni" id="numcni" class="couleur_champ">
                            </div>
                            <span style="color: red;"></span>
                        </div>

                        <div class="input-field">
                            <label>Nom</label>
                            <input type="text" placeholder="nom" required name ="nom" class="couleur_champ">
                        </div>

                        <div class="input-field">
                            <label>Prenoms</label>
                            <input type="text" placeholder="prenoms" required name="prenom" class="couleur_champ">
                        </div>

                        <div class="input-field">
                            <label>date de naissance</label>
                            <input type="date" placeholder="jj/mm/aaaa" id="naissance" max="2006-01-01" required name="naiss">
                            
                        </div>

                        <div class="input-field">
                        <label for="sexe">sexe : </label>
                           <select name="sexe" id="sexe"> 
                              
                                            <option >F</option>
                                            <option >M</option>
                             </select>
                       </select>
                     </div>

                        <div class="input-field">
                            <label>Lieu de vote</label>
                            <input type="text" placeholder="Lieu de vote" required name="lieu_de_vote" class="couleur_champ">
                        </div>
                        <div class="input-field">
                         <label>N&deg; Electeur</label>
                            <div>
                            <input type="text" placeholder="N&deg; Electeur" name="numelecteur" id="numelecteur"class="couleur_champ">
                            </div>
                            <span style="color: red;"></span>
                        </div>
                        <div class="input-field">
                            <label>Village / quartier</label>
                            <input type="text" placeholder="Village / quartier" required name="residence"class="couleur_champ">
                        </div>
                        <div class="input-field">
                            <label>Contact</label>
                            <input type="text" placeholder="Contact" required name="contact"class="couleur_champ">
                        </div>
                    </div>
                    <button class="sumbit">
                        <span class="btnText">Valider</span>
                    </button>
                </div>

            </div>
                        
        </form>
    </div>

<!-- menu modal -->
    <div class="modal" tabindex="-1" role="dialog" id="navbar" style="transition: 0.5s ease !important;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    
      <div class="modal-body menuLink" id="mbody" >
        <div class="pp">
            <p><a href="Menu_Agentf.php">Liste des electeurs</a></p>
        <p><a href="index.php">Se deconnecter</a></p>
        </div>
        
    </div>
  </div>
</div>

    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js"> </script>
    <script src="asset/js/md5.js"></script>
    <script src="asset/js/form.js"></script>
    <script>
        let naiss = document.getElementById('naissance');
        naiss.onblur = function() {
            let date = new Date();
            if(naiss.value != '') {
                if(naiss.value.split('-')[0] >= date.getFullYear() - 18) {
                    naiss.value = '';
                    alert('date de naissance invalide')
                }
            }
        }
        
        document.querySelector('.toggler').addEventListener('click', function(e) {
            $('#navbar').modal('toggle');
           
        })
    </script>
</body>
</html>