<?php
session_start();

if (!isset($_SESSION['user'])) header('Location: ./index.php');
include('connexion.php');
if (isset($_POST['numcni']) and isset($_POST['nom'])) {
    $con = $db->prepare('INSERT INTO agent VALUE(?,?,?,?,?)');
    $con->execute(array(
        $_POST['numcni'], $_POST['nom'],
        $_POST['prenom'], $_POST['sexe'], $_POST['administrateur'],
    ));
    header("location:formulaire_inscription.php");
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- pour le sommet -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="asset/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="asset/css/form.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Electeur</title>
    <style>
        .couleur_champ:focus {
            border: 1px solid orange;
        }

        .submit {
            background-color: solid orange;
        }
    </style>
</head>

<body style="background:white;">
<!-- nav -->
        <?php
        include('nav_consultation_form.php');
        ?>
<!-- fin nav -->
    <div class="container prime">
        <header>
            <h3>Agent</h3>
        </header>

        <form action="./formulaire_inscription.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>N&deg; CNI</label>
                            <div class='ci'>
                                <input type="text" placeholder="N&deg; de carte CNI" name="numcni" id="numcni" class="couleur_champ">
                            </div>
                            <span style="color: red;"></span>
                        </div>

                        <div class="input-field">
                            <label>Nom</label>
                            <input type="text" placeholder="nom" required name="nom" class="couleur_champ">
                        </div>

                        <div class="input-field">
                            <label>Prenoms</label>
                            <input type="text" placeholder="prenoms" required name="prenom" class="couleur_champ">
                        </div>
                        <div class="input-field">
                            <label for="sexe">sexe : </label>
                            <select name="sexe" id="sexe">
                                <option value="none">Selectionner un sexe</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>

                        <div class="checkbox-text">
                            <input type="checkbox" name="administrateur" value="1">
                            <label for="administrateur"> Statut Administrateur</label>
                            <br>

                            <input type="checkbox" name="administrateur" value="0">
                            <label for="administrateur">Statut Agent</label>
                        </div>

                    </div>
                    <button class="sumbit" type="su">
                        <span class="btnText">Valider</span>
                    </button>
                </div>

            </div>

        </form>

    </div>
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js"> </script>
    <script src="asset/js/md5.js"></script>
    <script src="asset/js/form.js"></script>

</body>

</html>