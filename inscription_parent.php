<?php
    $mailError = null;
    $nomPrenoms = null;
    $ville = null;
    $parent = null;
    $mail = null;
    $motDePasse = null;
    $connect = null;
    if(!empty($_POST) && isset($_POST)){
        if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
            $nomPrenoms = check($_POST['nom_prenoms']);
            $ville = check($_POST['ville']);
            $parent = check($_POST['identite_enfant']);
            $mail = check($_POST['mail']);
            $connect = (string)check($_POST['connect']);
            $motDePasse = sha1(check($_POST['motDePasse']));

            require "connectDataBase.php";
            $connect = DataBase::connect();
            $requete = $connect->prepare("
                INSERT INTO utilisateur_parent(nom_prenoms, ville, parent_de, email, motDePasse, connect)
                VALUES(?, ?, ?, ?, ?, ?);
            ");
            $requete->execute(array($nomPrenoms,
             $ville, 
             $parent,
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
    .h-img{
        height: 90vh;
        object-fit: full;
    }
</style>
<body>
    <section>
        <div class="container mx-auto my-3">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <img src="images/parent-img.jpg" alt="Un entraîneur" class="img w-100 h-img">
                </div>
                <div class="col-lg-6 col-md-6 justify-content-center my-4">
                    <div>
                        <h2 class="text-primary text-md-center">Inscription (2/2)</h2>
                    </div>
                    <div>
                        <form action="inscription_parent.php" method="post">
                            <div class="mt-2">
                                <label class="form-label"for="nom_prenoms">Noms et Prénoms : </label>
                                <input class="form-control" type="text" placeholder="John Doe" name="nom_prenoms" id="nom_prenoms" required>
                            </div>
                            <div class="mt-2">
                                <label class="form-label"for="ville">Ville : </label>
                                <input class="form-control" type="text" placeholder="Ex: Parakou" name="ville" id="ville" required>
                            </div>
                            <div class="mt-2">
                                <label class="form-label"for="identite_enfant">Père / Mère de :</label>
                                <input class="form-control" type="text" placeholder="" name="identite_enfant" id="identite_enfant" required>
                            </div>
                            <div class="mt-2">
                                <label class="form-label"for="mail">Adresse Email : </label>
                                <input class="form-control" type="text" placeholder="Veuillez entrer votre adresse email" name="mail" id="mail" required>
                                <?php if($mailError): ?>
                                    <p class="text-danger mt-2">
                                        <?= $mailError ?>
                                    </p>
                                <?php endif ?>
                            </div>
                            <div class="mt-2">
                                <label class="form-label"for="motDePasse">Mot de Passe : </label>
                                <input class="form-control" type="password" placeholder="Créer un mot de passe" name="motDePasse" id="motDePasse" required>
                            </div>
                            <div class="mt-2">
                                <input type="checkbox" name="connect" id="connect" checked>
                                <span>Restez connecté</span>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary form-control">S'inscrire</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>