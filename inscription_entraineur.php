<?php
    session_start();
    $mailError = null;
    $nomPrenoms = null;
    $ville = null;
    $annee_experience = null;
    $mail = null;
    $motDePasse = null;
    $connect = null;
    if(!empty($_POST) && isset($_POST)){
        if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
            $nomPrenoms = check($_POST['nom_prenoms']);
            $ville = check($_POST['ville']);
            $annee_experience = check($_POST['annee_exp']);
            $mail = check($_POST['mail']);
            $connect = (string)check($_POST['connect']);
            $motDePasse = sha1(check($_POST['motDePasse']));
            require "connectDataBase.php";
            $connect = DataBase::connect();
            $requete = $connect->prepare("
                INSERT INTO utilisateur_entraineur(nom_prenoms, ville, annee_experience, mail, motDePasse, valcheck)
                VALUES(?, ?, ?, ?, ?, ?);
            ");
            $requete->execute(array($nomPrenoms,
             $ville, 
             $annee_experience,
              $mail,
               $motDePasse,
                $_POST['connect']));
            header("Location: connexion.php");
        }else{
            $mailError = "Votre mail n'est pas valide !";
        }
        
    }
    function check($donnee){
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);
        return $donnee;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription (2/2)</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <section>
        <div class="container mx-auto my-3">
            <div class="row">
                <div class="col-6">
                    <img src="images/wax-03.png" alt="Un entraîneur" class="img">
                </div>
                <div class="col-6">
                    <div>
                        <h2 class="text-primary">Inscription (2/2)</h2>
                    </div>
                    <div>
                        <form action="inscription_entraineur.php" method="post">
                            <div class="mt-2">
                                <label class="form-label"for="nom_prenoms">Noms et Prénoms</label>
                                <input class="form-control" type="text" placeholder="John Doe" name="nom_prenoms" id="nom_prenoms" required>
                            </div>
                            <div class="mt-2">
                                <label class="form-label"for="ville">Ville</label>
                                <input class="form-control" type="text" placeholder="Ex: Parakou" name="ville" id="ville" required>
                            </div>
                            <div class="mt-2">
                                <label class="form-label"for="annee_exp">Annee d'Experience</label>
                                <input class="form-control" type="text" placeholder="Ex: 7ans" name="annee_exp" id="annee_exp" required>
                            </div>
                            <div class="mt-2">
                                <label class="form-label"for="mail">Adresse Email</label>
                                <input class="form-control" type="text" placeholder="Veuillez entrer votre adresse email" name="mail" id="mail" required>
                                <?php if($mailError): ?>
                                    <p class="text-danger mt-2">
                                        <?= $mailError ?>
                                    </p>
                                <?php endif ?>
                            </div>
                            <div class="mt-2">
                                <label class="form-label"for="motDePasse">Mot de Passe</label>
                                <input class="form-control" type="password" placeholder="Votre Mot de Passe" name="motDePasse" id="motDePasse" required>
                            </div>
                            <div class="mt-2">
                                <input type="checkbox" name="connect" id="connect" checked>
                                <span>Restez connecté</span>
                            </div>
                            <div class="mt-2">
                                <a href="connexion.php" class="text-light"><button class="btn btn-primary form-control">M'inscrire</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>