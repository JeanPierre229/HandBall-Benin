<?php 
    function view($img, $description, $url, $form=""){
        echo "<div class='col-lg-4 col-md-4 col-12 px-1'>";
            echo "<div class='text-center'>";
                echo '<a href="' .$url. '">"<img src="'.$img. '" class="' .$form.'" alt=""></a>';
            echo '</div>';
            echo '<div>';
                echo '<p class="text-center">';
                    echo $description;
                echo '</p>';
            echo '</div>';
        echo "</div>";
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waxangari_Labs-Inscription2</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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
    .img-ins{
        width: 230px;
        height: 230px;
        border-radius: 50%;
        border: 1px solid white;
        object-fit: full;
    }
    .img-resize{
        width: 230px;
        height: 230px;
        border-radius: 50%;
        border: 1px solid white;
        object-fit: full;
    }
</style>
<body>
    <section>
    <div class="container mt-3">
        <div class="col-12">
            <div class="text-center text-primary">
                <h1>Inscription (1/2)</h1>
            </div>
            <div class="text-center mt-3">
                <h3>Choisir votre statut de vous mieux à l'aune</h3>
            </div>
            <div class="row mt-3">
                <?php view("images/parent-img.jpg", "Parent", "inscription_parent.php", "img-ins")?>
                <?php view("images/joueur-ins.jpg", "Joueur", "inscription_joueur.php", "img-resize")?>
                <?php view("images/wax-ins-03.png", "Entraineur", "inscription_entraineur.php")?>
            </div>
            <div class="mt-3 text-center">
                <a href="connexion.php"><button class="btn btn-primary px-5">Connexion</button></a>
            </div>
        </div>
    </div>
    </section>
    
</body>
</html>