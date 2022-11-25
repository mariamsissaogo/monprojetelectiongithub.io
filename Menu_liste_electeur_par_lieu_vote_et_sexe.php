<?php
// session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- pour le sommet -->
<!-- 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <!----======== CSS ======== -->
    <!-- <link rel="stylesheet" href="asset/css/sb-admin-2.min.css"> -->
    <link rel="stylesheet" href="asset/css/form.css">
    <link rel="stylesheet" href="sidebar1.css">
    <!-- <link rel="stylesheet" href="sidebar2 copy.css"> -->
    <!-- <link rel="stylesheet" href="asset/css/sb-admin-2.min.css"> -->


    <!----===== Iconscout CSS ===== -->
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="sidebar1.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body style="background:white;">
    <!-- nav -->
    <?php
    include('nav_consultation.php');
    ?>
    <!-- fin nav -->
    <!-- <button onclick="window.print()">Print this page</button> -->
   
    <div class="" style="margin-top: 150px;">
        <?php
        include("liste_electeur_par_lieu_vote_et_sexe.php");
        ?>
    </div>


</body>
<script>
    document.querySelector('.btn_imprimer').addEventListener('click', function(){
        document.querySelector('#id_list_deroulante_vs').style.display = "none";
        // document.querySelector('#id_list_deroulante_qs2').style.display = "none";
        document.querySelector('#cl_menu').style.display = "none";
        // document.querySelector('#id_titre_tableau_qs').style.marginTop = "0px";
        document.querySelector('#id_list_deroulante_vs').style.marginTop = "0px";
        // document.querySelector('#id_list_deroulante_qs2').style.marginTop = "0px";
        
        window.print();
        document.querySelector('#id_list_deroulante_vs').style.display = "block";
        // document.querySelector('#id_list_deroulante_qs2').style.display = "block";
        document.querySelector('#cl_menu').style.display = "block";

    })
</script>
<!-- <script src="etat.js"></script> -->
</html>