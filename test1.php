<?php
    // session_start();

    function adh_gamer($img, $titre , $description, $justifier){
        echo '<div class="col rad bg-light mx-5 p-3">
                        <div class="p-3 text-center">
                            <img src="images/' .$img. '" alt="La main dans la main" class="img w-75 text-center rad" style="height: 300px;">
                        </div>
                        <div class="text-center">
                            <h3>' .$titre. '</h3>
                            <p class="col-10" style="margin: 0 auto; text-align: ' .$justifier. ';">
                                ' .$description. '
                            </p>
                        </div>
                    </div>';
    }
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="icon" href="images/head-icon.png">
</head>
<style>
    .rad{
        border-radius: 20px;
    }
</style>
<body>
    <header>
        <?php require "header.php"; ?>
    </header>
    <main class="container-fluid">
        <div class="row">
        <?php require "aside.php"; ?>
            <div class="col-10 mx-auto">
                <h2 class="text-center  ">
                    <strong>Adhésion à notre club</strong>
                </h2>
                <h2 class="text-center">Qui ?</h2>
                <p class="text-justify">
                    Toute personne saine physiquement, mentalement et moralement aimant le défi physique, la collaboration et fait travailler son intellectuel pour venir à bout des défis rencontrés sur le terrain et en dehors. C'est une école de la vie qui vous prépare individuellement et collectivement au défis futur. <br>Prêt à vivre l'excitation du handball avec une équipe passionnée et dévouée ? Rejoignez notre club de handball et decouvrez une communauté dynamique ou l'esprit d'equipe et la compétition se rencontrent. Le club est ouvert:  
                </p>
                <div class="row">
                    <?php adh_gamer("adh-wax-01.jpeg", "1. Aux amateurs du handball", "Qui veulent juste apprendre le handball par passion et juste pour jouer avec des amis.", "") ?>
                    <?php adh_gamer("adh-wax-02.jpeg", "2. Aux professionnels de handball", "Qui veulent apprendre le handball pour en faire une profession.", "") ?>
                </div>
                <div class="row my-4">
                    <?php adh_gamer("adh-wax-03.jpeg", "Avantage 1", "En tant que membre de notre club de handball, vous bénéficierez d'une expérience inoubliable sur et en dehors du terrain. Que vous soyez débutant ou joueur expérimenté, notre club offre des opportunités pour tous les niveaux et tous les âges. Vous serez encadré par des expérimentés qui vous aideront à développer vos compétences techniques, votre endurance et votre stratégie de jeu.", "justify") ?>
                    <?php adh_gamer("adh-wax-04.jpeg", "Avantage 2", "En rejoignant notre club, vous ferez partie d'une véritable famille de passionnés de handball. Vous aurez l'occasion de vous faire de nouveaux amis, de partager des moments de camaraderie et de créer des souvenirs durables lors de nos événements sportifs et sociaux.", "justify") ?>
                </div>
                <div class="row">
                    <u>NB :</u> Les séances sont ouvertes à toutes les catégories de personnes et de sexes.
                    <ul>
                        <li>Les jeunes</li>
                        <ul type="square">
                            <li>Les cadets/cadettes -> moins de 17ans </li>
                            <li>Junior -> moins de 20ans </li>
                        </ul>
                    </ul>
                </div>
                <div class="row mx-auto my-4">
                    <div class="col-4">
                        <img src="images/adh-wax-03.jpeg" alt="La main dans la main" class="img w-75">
                    </div>
                    <div class="col-8 my-4">
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
                    <div class="col-8 my-4">
                        <h3 class="text-center">
                            <strong>Avantage 2</strong>
                        </h3>
                        <p class="text-justify" style="font-size: 16px;">
                            En rejoignant notre club, vous ferez partie d'une véritable famille de passionnés de handball. Vous
                            aurez l'occasion de vous faire de nouveaux amis, de partager des moments de camaraderie et de créer
                            des souvenirs durables lors de nos événements sportifs et sociaux.
                        </p> 
                    </div>
                    <div class="col-4">
                        <img src="images/adh-wax-04.jpeg" alt="La main dans la main" class="img w-75">
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