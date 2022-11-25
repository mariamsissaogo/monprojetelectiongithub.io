<?php
// session_start();
?>
<!-- menu adminin f -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="css/agent.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

   
    <script src="consultation/jquery.main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electeur</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 " style="background:#3f3fe3;">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    
                    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <!-- <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span> -->
                            </a>
                       
                        </li>
                        <li>
                  
                            <a href="Menu_Agentf.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">Liste des electeurs</span>
                            </a>
                        </li>
                        <li>
                            <a href="Menu_Agentf.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">Liste des electeurs</span>
                            </a>
                            <a href="index.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline" style="color:black;">Deconnexion</span>
                            </a>
                        </li>
                      


                        <hr>
                       
                </div>
            </div>
            <div class="col py-3">

                <!-- entête -->
                <?php
                include('formulaire.php');
                ?>

                <!-- <h3 style="background: #6c757d; color: white;" class="card-header text-center bg-secondary text-light">BIENVENUE </h3> -->
                <!-- <p class="lead"> -->

                <!-- <ul class="list-unstyled">
                    <li><h5>Responsive</h5> shrinks in width, hides text labels and collapses to icons only on mobile</li>
                </ul> -->

            </div>
        </div>
    </div>
</body>

</html>