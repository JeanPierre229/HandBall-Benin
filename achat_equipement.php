<?php
    session_start();
    $el = "achat";
    function achat($nm_img, $alt, $titre_img, $prix){
        echo '<div class="text-center mx-auto my-2">
                <form action="achat_equipement.php" method="post" class="formulaire">
                        <img src="' .$nm_img. '" alt="' .$alt. '" class="img w-75">
                        <h5>' .$titre_img. '</h5>
                        <h6>Prix : ' .$prix. ' FCFA</h6>
                        <button class="btn btn-primary px-5 py-0 rad">Acheter</button>
                </form>
            </div>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat d'équipement</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="icon" href="images/head-icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&famil
    y=Reem+Kufi+Fun:wght@400..700&display=swap" 
    rel="stylesheet">
    <script src="https://cdn.kkiapay.me/k.js"></script>
</head>
<style>
    *{
        font-size: 15px;
        font-family: "Outfit", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
    }
    .rad{
        border-radius: 10px;
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
                    Achat d'équipement sportif pour le HandBall
                </h2>
                <div class="row px-3 mx-3 my-3">
                    <div class="col text-center my-2">
                        <form action="achat_equipement.php" method="post" class="formulaire">
                                <img src="images/ballon-handball.png" style="height: 150px; width: 90px; object-fit:cover; border-radius: 5px;" alt="Un ballon de HandBall" class="img w-75">
                                <h5 class="text-primary">Ballon de HandBall</h5>
                                <h6>Prix : 7000 FCFA</h6>
                                <input type="number" name="montant" id="montant" style="display: none;" value="7000">
                                <button class="btn btn-primary px-5 py-0 rad">Acheter</button>
                        </form>
                    </div>
                    <span class="mx-3"></span>
                    <div class="col text-center mx-auto my-2">
                        <form action="achat_equipement.php" method="post" class="formulaire1">
                                <img src="images/maillot.png" style="height: 150px; object-fit:cover; border-radius: 5px;" alt="Un maillots" class="img w-75">
                                <h5 class="text-primary">Maillots</h5>
                                <h6>Prix : 3000 FCFA</h6>
                                <input type="number" name="montant" id="montant" style="display: none;" value="3000">
                                <button class="btn btn-primary px-5 py-0 rad">Acheter</button>
                        </form>
                    </div>
                    <div class="col text-center mx-auto my-2">
                        <form action="achat_equipement.php" method="post" class="formulaire2">
                                <img src="images/chaussure.png" style="height: 150px; object-fit:cover; border-radius: 5px;" alt="Une chaussure de handball" class="img w-75">
                                <h5 class="text-primary">Chaussure handball</h5>
                                <h6>Prix : 5000 FCFA</h6>
                                <input type="number" name="montant" id="montant" style="display: none;" value="5000">
                                <button class="btn btn-primary px-5 py-0 rad">Acheter</button>
                        </form>
                    </div>
                </div>
                <div class="row px-3 mx-3 my-3">
                    <div class="text-center mx-auto my-2">
                        <form action="achat_equipement.php" method="post" class="formulaire3">
                                <img src="images/protege.png" alt="Un protège tibia" class="img w-75">
                                <h5 class="text-primary">Protège Tibia</h5>
                                <h6>Prix : 7000 FCFA</h6>
                                <input type="number" name="montant" id="montant" style="display: none;" value="5000">
                                <button class="btn btn-primary px-5 py-0 rad">Acheter</button>
                        </form>
                    </div>
                    <span class="mx-3"></span>
                    <div class="text-center mx-auto my-2">
                        <form action="achat_equipement.php" method="post" class="formulaire4">
                                <img src="images/poignet.png" alt="Une bande de poignet" class="img w-75">
                                <h5 class="text-primary">Bande poignet</h5>
                                <h6>Prix : 7000 FCFA</h6>
                                <input type="number" name="montant" id="montant" style="display: none;" value="7000">
                                <button class="btn btn-primary px-5 py-0 rad">Acheter</button>
                        </form>
                    </div>
                    <div class="text-center mx-auto my-2">
                        <form action="achat_equipement.php" method="post" class="formulaire5">
                                <img src="images/genou.png" alt="Une genouillère" class="img w-75">
                                <h5 class="text-primary">Genouillère</h5>
                                <h6>Prix : 7000 FCFA</h6>
                                <input type="number" name="montant" id="montant" style="display: none;" value="7000">
                                <button class="btn btn-primary px-5 py-0 rad">Acheter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script>
    function payer(classe, prix){
        var classe = document.querySelector("."+classe+"");

        classe.onsubmit=(e)=>{
            e.preventDefault();
            openKkiapayWidget({
            amount:classe.montant.value, 
            position: "right", 
            callback: "http://localhost:80/Projet_WaxangariLabs/index.php", 
            data: "Test de paiement",
            theme: "#092374",
            sandbox: "true",
            key: "ea194080f5a011ee9f805f907fefa779"
            })
        }
    }
    payer("formulaire", 7000);
    payer("formulaire1", 3000);
    payer("formulaire2", 5000);
    payer("formulaire3", 7000);
    payer("formulaire4", 7000);
    payer("formulaire5", 7000);
</script>