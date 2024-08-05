<?php
    session_start();
    $el = "nos_joueurs";
    function information($icon, $txt, $description){
        echo '<div class="col-2 ml-5 py-1 info-joueur">
            <div class="bg-light my-2 text-center">
                <i class="fa fa-'.$icon.'" aria-hidden="true"></i>
            </div>
            <div>
                <p class="text-center" style="font-size: 12px;">' .$txt. '</p>
                <h6 class="text-center">' .$description. '</h6>
            </div>
        </div>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos joueurs</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="icon" href="images/head-icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&famil
    y=Reem+Kufi+Fun:wght@400..700&display=swap" 
    rel="stylesheet">
</head>
<style>
    *{
        font-size: 15px;
        font-family: "Outfit", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
    }
    #img-traite{
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 10px solid #fff;
    }
    .info-joueur{
        background-color: rgb(238, 238, 238);
        border-radius: 10px;
    }
</style>
<body>
    <main class="container-fluid my-5">
        <div class="row">
            <?php require "aside.php"; ?>
            <div class="col-10 mx-auto">
                <div class="row">
                    <div class="col-3">
                        <?php if(!empty($_SESSION['profil']) && isset($_SESSION['profil'])){ ?>
                            <img src="images/img-joueur/<?=$_SESSION['profil']?>" alt="Une personne" class="img mt-2" id="img-traite">
                        <?php }else{ ?>
                            <i class="fa fa-user" style="font-size: 250px;"></i>
                        <?php } ?>
                    </div>
                    <div class="col-8">
                        <h4>
                            <?php
                                if(!empty($_SESSION['nom'])){
                                    echo $_SESSION['nom']. " ".$_SESSION['prenoms'];
                                }elseif(!empty($_SESSION['nom_prenoms'])){
                                    echo $_SESSION['nom_prenoms'];
                                }else{
                                    echo "Ousmane TRAORE";
                                }
                            ?>
                        </h4>
                        <div class="text-primary">
                            <div class="row mt-3">
                                <span>
                                    <strong><i class="fa fa-user" style="font-size: 30px;"></i></strong>
                                </span>
                                <span class="col-5">
                                    <strong>
                                        <?php 
                                             if(!empty($_SESSION['nom'])){
                                                echo $_SESSION['nom']. " ".$_SESSION['prenoms'];
                                            }elseif(!empty($_SESSION['nom_prenoms'])){
                                                echo $_SESSION['nom_prenoms'];
                                            }else{
                                                echo "Ousmane TRAORE";
                                            }
                                        ?> 
                                        est l'un de nos meilleurs joueurs
                                    </strong>
                                </span>
                            </div>
                        </div>
                        <div class="info-joueur pt-2 px-5 mt-2 col-11">
                            <div class="row">
                                <div class="text-center col-4">
                                    <h5 class="text-danger" style="font-size: 18px;">Performance</h5>
                                </div>
                                <div class="text-center col-4" >
                                    <h5 class="text-danger" style="font-size: 18px;">Nombre de match gagné</h5>
                                </div>
                                <div class="text-center col-4" >
                                    <h5 class="text-danger" style="font-size: 18px;">Compétence clé</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-center ">
                                    <h4 class="mt-5">83%</h4>
                                </div>
                                <div class="col-4 text-center ">
                                    <h4 class="mt-5">32</h4>
                                </div>
                                <div class="col-4 text-center ">
                                    <h4 class="mt-5">Défense</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mx-5 my-2">
                    <h4>Information clé</h4>
                </div>
                <div class="row">
                    <?php information("check", "Performance", "83%") ?>
                    <?php information("trophy", "Nombre de tir", "112") ?>
                    <?php information("minus-circle", "Efficacité", "10h") ?>
                    <?php information("graduation-cap", "Participation", "Défense") ?>
                </div>
                <div class="row mt-3 mx-5 my-2">
                    <div class="col-5 mt-3 mr-5">
                        <div>
                            <h4>Suivi des progrès</h4>
                        </div>
                        <div class="mb-2">
                            <div class="row info-joueur">
                                <div class="bg-light m-3 p-3 info-joueur text-center">
                                    <i class="fa fa-glass" style="font-size: 30px;"></i>
                                </div>
                                <div class="">
                                    <p class="mt-2">
                                        <span class="text-start pr-5"><strong>Progrès de la séance</strong></span>
                                        <span class="text-right">2/3 séances</span>
                                    </p>
                                    <hr class="ml-3" width="95%" size="10" style="height: 3px; background-color: gray;">
                                    <p>
                                        Terminer 3 séances d'affilé
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row info-joueur">
                                <div class="bg-light m-3 p-3 info-joueur text-center">
                                    <i class="fa fa-trophy" style="font-size: 30px;"></i>
                                </div>
                                <div class="">
                                    <p class="mt-2">
                                        <span class="text-start pr-5"><strong>Nombre de point gagné</strong></span>
                                        <span class="text-right">1200/3000</span>
                                    </p>
                                    <hr class="ml-3" width="95%" size="10" style="height: 3px; background-color: gray;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 mt-3">
                        <div>
                            <h4>Suivi des progrès</h4>
                        </div>
                        <div class="mb-2">
                            <div class="row info-joueur">
                                <div class="bg-light m-3 p-3 info-joueur text-center">
                                    <i class="fa fa-glass" style="font-size: 30px;"></i>
                                </div>
                                <div class="">
                                    <p class="mt-2">
                                        <span class="text-start pr-5"><strong>Progrès de la séance</strong></span>
                                        <span class="text-right">2/3 séances</span>
                                    </p>
                                    <hr class="ml-3" width="95%" size="10" style="height: 3px; background-color: gray;">
                                    <p>
                                        Terminer 3 séances d'affilé
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row info-joueur">
                                <div class="bg-light m-3 p-3 info-joueur text-center">
                                    <i class="fa fa-trophy" style="font-size: 30px;"></i>
                                </div>
                                <div class="">
                                    <p class="mt-2">
                                        <span class="text-start pr-5"><strong>Nombre de point gagné</strong></span>
                                        <span class="text-right">1200/3000</span>
                                    </p>
                                    <hr class="ml-3" width="95%" size="10" style="height: 3px; background-color: gray;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>