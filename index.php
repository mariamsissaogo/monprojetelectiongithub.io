<?php 
session_start();

if(isset($_SESSION['user'])) unset($_SESSION['user']);

include('connexion.php');
if(isset($_POST['pseudo']) and isset($_POST['pwd'])) {
    $con = $db -> prepare("SELECT * FROM agent WHERE NOM = '".$_POST['pseudo']."' AND NUMCNI_AGENT = '".$_POST['pwd']."'");
    $con -> execute();
    $res = $con -> fetch();
    $_SESSION['user'] = $res;
    if($res) {

      if($_SESSION['user']['administrateur'] == 1) {
        header("Location: formulaire_inscription.php");
    } 
    elseif($_SESSION['user']['administrateur'] == 0)
    {
        header("Location: formulaire.php");
    }
    }

    else{
        header("Location: index.php");
    }  
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="asset/css/style.css">
         
    <!--<title>Login & Registration Form</title>-->
</head>
<body style="background:white;" >
    
    <div class="container" >
        <div class="forms">
            <div class="form login">
                <span class="title">Connexion</span>

                <form action="./index.php" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Nom d'utilisateur" required name="pseudo">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Mot de passe" required name="pwd">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
  

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Se souvenir de moi</label>
                        </div>
                        
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Connexion">
                    </div>
                </form>
              
          

            </div>

    </div>

    <script src="script.js"></script>

</body>
</html>
