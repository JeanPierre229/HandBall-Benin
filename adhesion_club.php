<?php
    session_start();
    $el = "adhesion";
    $titre = null;
    $video = null;
    function check($donnee){
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlentities($donnee);
        return $donnee;
    }

    if(!empty($_GET)){
        $titre = check($_GET["titre"]);
        $video = check($_GET["video"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Vidéos</title>
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
</style>
<body>
    <header>
        <?php require "header.php"; ?>
    </header>
    <main class="container-fluid">
        <div class="row">
        <?php require "aside.php"; ?>
            <div class="col-lg-10 col-6 mx-auto">
                <h2 class="text-center  ">
                    Adhésion à notre club
                </h2>
                <p class="text-justify">
                    Toute personne saine physiquement, mentalement et moralement aimant le défi physique, la collaboration et fait travailler son intellectuel pour venir à bout des défis rencontrés sur le terrain et en dehors. C'est une école de la vie qui vous prépare individuellement et collectivement au défis futur. <br>Prêt à vivre l'excitation du handball avec une équipe passionnée et dévouée ? Rejoignez notre club de handball et decouvrez une communauté dynamique ou l'esprit d'equipe et la compétition se rencontrent. Le club est ouvert:  
                </p>
                <div class="row mx-auto my-4">
                    <div class="col-lg-4 col-12 text-center">
                        <img src="images/main_main.png" alt="La main dans la main" class="img w-75">
                    </div>
                    <div class="col-lg-8 col-12 my-4">
                        <h3 class="text-center">
                            <strong>Avantage 1</strong>
                        </h3>
                        <p class="text-justify" style="font-size: 16px;">
                            En tant que membre de notre club de handball, vous
                            bénéficierez d'une expérience inoubliable sur et en
                            dehors du terrain. Que vous soyez débutant ou joueur expérimenté, 
                            notre club offre des opportunités pour tous les niveaux et tous les âges. Vous serez encadré par des expérimentés qui vous aideront à développer vos
                            compétences techniques, votre endurance et votre
                            stratégie de jeu. 
                        </p> 
                    </div>
                </div>
                <div class="row mx-auto bg-light my-4">
                    <div class="col-lg-8 col-12 my-4">
                        <h3 class="text-center">
                            <strong>Avantage 2</strong>
                        </h3>
                        <p class="text-justify" style="font-size: 16px;">
                            En rejoignant notre club, vous ferez partie d'une véritable famille de passionnés de handball. Vous
                            aurez l'occasion de vous faire de nouveaux amis, de partager des moments de camaraderie et de créer
                            des souvenirs durables lors de nos événements sportifs et sociaux.
                        </p> 
                    </div>
                    <div class="col-lg-4 col-12 text-center">
                        <img src="images/main_hanche.png" alt="La main dans la main" class="img w-75">
                    </div>
                </div>
                <div class="text-center">
                    <a href="#">
                        <button class="btn btn-primary py-1 px-5">Adhérer</button>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>