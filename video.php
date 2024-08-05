<?php
    session_start();
    $el = "seformer";
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
    #vid{
        border-radius: 30px;
    }
</style>
<body>
    <header>
        <?php require "header.php"; ?>
    </header>
    <main class="container-fluid">
        <div class="row">
        <?php require "aside.php"; ?>
            <div class="col-10">
                <h2 class="text-center">
                    <strong><?php echo $titre; ?></strong>
                </h2>
                <div>
                    <div class="text-center">
                        <video controls="controls" class="w-50 container-fluid" id="vid">
                            <source src="<?= $video ?>" />
                        </video>
                    </div>
                    <div class="mx-5 my-3">
                        <h4 class="">Description de la vidéo</h4>
                        <ul type="dash">
                            <li>
                                L'attaque placée: les systèmes de jeu, les combinaisons, les démarquages, etc.
                            </li>
                            <li>
                                La défense: les différentes formations défensives, les techniques de marquages, 
                                le replis défensive, etc.
                            </li>
                            <li>
                                Les transitions attaque-défense: les contre-attaques, les montées de balle rapides
                            </li>
                        </ul>
                    </div>
                    <div class="mx-5 text-center my-3">
                        <a href="seformer.php">
                            <button class="btn btn-primary px-5 py-1">
                                <i class="fa fa-arrow-left px-2"></i>Retour
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>