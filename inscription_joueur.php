<?php 
    session_start();
    $image = null;
    $nom = null;
    $prenoms = null;
    $date_naissance = null;
    $lieu_naissance = null;
    $genre = null;
    $ref_cip = null;
    $contact_parent = null;
    $taille = null;
    $poids = null;
    $hauteur_poids = null;
    $imc = null;
    $empan = null;
    $envergure = null;
    $pointure = null;
    $lateralite = null;
    $force = null;
    $vitesse = null;
    $endurance = null;
    $sargent_test = $tir = $dribble = $feinte = $participe = $mail = $motDePasse = $connecte = null;
    $tir_face_gardien = $passe = $tir_decision = $monte_repli = null;   
    $errorUpdate = null;
    $imageErreur = null;
    if(!empty($_POST) && isset($_POST)){
        $nom = $_POST['nom'];
        $prenoms = $_POST['prenoms'];
        $date_naissance = $_POST['date_naissance'];
        $lieu_naissance = $_POST['lieu_naissance'];
        $genre = $_POST['genre'];
        $ref_cip = $_POST['ref_cip'];
        $contact_parent = $_POST['contact_parent'];
        $taille = $_POST['taille'];
        $poids = $_POST['poids'];
        $hauteur_poids = $_POST['hauteur_poids'];
        $imc = $_POST['imc'];
        $empan = $_POST['empan'];
        $envergure = $_POST['envergure'];
        $pointure = $_POST['pointure'];
        $lateralite = $_POST['lateralite'];
        $force = $_POST['force'];
        $vitesse = $_POST['vitesse'];
        $endurance = $_POST['endurance'];
        $sargent_test = $_POST['sargent_test'];
        $tir = $_POST['tir'];
        $dribble = $_POST['dribble'];
        $feinte = $_POST['feinte'];
        $participe = $_POST['participe'];
        $tir_face_gardien = $_POST['tir_face_gardien'];
        $passe = $_POST['passe'];
        $tir_decision = $_POST['tir_decision'];
        $monte_repli = $_POST['monte_repli'];
        $mail = $_POST['mail'];
        $motDePasse = sha1($_POST['motDePasse']);
        $connecte = $_POST['connect'];

        //Partie réservé au traitement de l'image à envoyer
        $image = check($_FILES["photo_profil"]["name"]);
        $image_path = 'images/img-joueur/' . basename($image);
        $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);
        $upload = false;

        if($image){
            $upload = true;
            $extension = array('jpg', 'png', 'jpeg', 'gif');
            $image_ext = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
    
            if(!in_array($image_ext, $extension)){
                $imageErreur = "Le fichier doit être sous l'un de ces formats: .jpg, .png, .jpeg, et .gif";
                $upload = false;
            }
    
            if(file_exists($image_path)){
                $imageErreur = "Cette image existe déjà !";
                $upload = false;
            }
    
            if($_FILES["photo_profil"]["size"] > 500000){
                $imageErreur = "Le fichier ne doit pas dépasser 500kb";
                $upload = false;
            }
    
            $special_char = array("'", "/", "\\", ":", "<", ">");
            if(preg_match('/[\'\/\\\\:<>\"]/', $image)){
                $imageErreur = "Le nom du fichier ne doit pas contenir ces caractères: /, \\, :, < et >";
                $upload = false;
            }
    
            if($upload){
                if(!move_uploaded_file($_FILES["photo_profil"]["tmp_name"], $image_path)){
                    $imageErreur = "Erreur lors du chargement du fichier";
                    $upload = false;
                }
            }
    
            if($upload){
                // Insertion dans la base de données seulement si l'upload est réussi
                require "connectDataBase.php";
                $connect = DataBase::connect();
                $requete1 = $connect->prepare("
                        INSERT INTO utilisateurs_joueurs
                                    (profil, nom, prenoms, date_naissance, 
                                    lieu_naissance, sexe, ref_cip, contact_parent, 
                                    taille, poids, hauteur_poids, imc, empan, 
                                    envergure, pointure, lateralite, force_physique, 
                                    vitesse, endurance, test_detente, tir, dribble, 
                                    feinte, adaptation_jeu, tir_gardien, passe, 
                                    tir_decision, montee, mail, motDePasse, connect)
                        VALUES('$image', '$nom', '$prenoms', 
                                    '$date_naissance', '$lieu_naissance', 
                                    '$genre', '$ref_cip', '$contact_parent', 
                                    '$taille', '$poids', '$hauteur_poids', 
                                    '$imc', '$empan', '$envergure', '$pointure', 
                                    '$lateralite', '$force', '$vitesse', '$endurance', 
                                    '$sargent_test', '$tir', '$dribble', '$feinte', 
                                    '$participe', '$tir_face_gardien', '$passe', 
                                    '$tir_decision', '$monte_repli', '$mail', '$motDePasse', '$connecte');
                ");
                $requete1->execute();
                header("Location: connexion.php");

                $_SESSION['profil'] = $image;
            }
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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inscription_joueur.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&famil
    y=Reem+Kufi+Fun:wght@400..700&display=swap" 
    rel="stylesheet">
    <title>Inscription_Joueur(e) - WaxangariLabs</title>
</head>
<style>
    *{
        font-size: 15px;
        font-family: "Outfit", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
    }
    .photo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #000;
            width: 200px;
            height: 200px;
            cursor: pointer; /* Ajout de la propriété pour indiquer que le texte est cliquable */
            /* overflow: hidden; Empêche le débordement de l'image */
        }
        /* Style pour cacher l'input de type file */
        #fileInput {
            display: none;
        }
        /* Style pour afficher l'image sélectionnée */
        #selectedImage {
            max-width: 100%;
            max-height: 100%;
        }
    #a:hover{
        text-decoration: none;
        color: black;
    }
</style>
<body class="container shadow-lg rounded p-4 m-auto mt-5">
    <header>
        <h1 class="text-center">FICHE DE DETECTION HANDBALL</h1>
    </header>
    <main>
        <form action="inscription_joueur.php" method="post" enctype="multipart/form-data">
            <ol type="I">
                <!-- section I -Identification personnelle- -->
                <section>
                    <h3 class="text-start">
                        <strong><li>Identification</li></strong>
                    </h3>
                    <div class="row">
                        <div class="photo-container mt-5 mr-5 rounded-5" onclick="document.getElementById('fileInput').click();">
                            <p id="text">PHOTO 4 * 4</p>
                            <!-- Input de type file caché -->
                            <input id="fileInput" type="file" name="photo_profil" accept="image/*" onchange="chargerImage(event)">
                            <!-- Affichage de l'image sélectionnée -->
                            <img id="selectedImage" src="" alt="">
                        </div>
                        <div class="m-2">
                            <div class="row mb-2">
                                <div class="col-4 pt-2">
                                    <label for="nom" class="form-label">Nom : </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="nom" id="nom" class="input_edit">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 pt-2">
                                    <label for="prenoms" class="form-label">Prénoms : </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="prenoms" id="prenoms" class="input_edit">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 pt-2">
                                    <label for="naissance" class="form-label">Date et lieu de Naissance : </label>
                                </div>
                                <div class="col-3">
                                    <input type="date" name="date_naissance" id="date_naissance" class="input_naissance">
                                </div>
                                
                                <div class="text-start mt-2">à</div>

                                <div class="col-4">
                                    <input type="text" name="lieu_naissance" id="lieu_naissance" class="input_naissance lieu_naissance">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 pt-2">
                                    <label for="sexe" class="form-label">Sexe : </label>
                                </div>
                                <div class="col-8 mt-2">
                                    <div class="row">
                                        <div class="col-4 text-start mx-3">
                                            <span>
                                                <label for="masculin" class="form-label">Masculin : </label>
                                                <input type="radio" name="genre" id="masculin" value="masculin">
                                            </span>
                                        </div>
                                        <div class="col-4 text-center mx-3">
                                            <span>
                                                <label for="feminin" class="form-label">Feminin : </label>
                                                <input type="radio" name="genre" id="feminin" value="feminin">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 pt-2">
                                    <label for="ref_cip" class="form-label">Réf. N° CIP : </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="ref_cip" id="ref_cip" class="input_edit">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 pt-2">
                                    <label for="contact_parent" class="form-label">Contact des Parents : </label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="contact_parent" id="naissance" class="input_edit">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- section II -donnees anthropométriques-->
                <section>
                    <h3 class="text-start">
                        <strong><li>Données anthropométriques</li></strong>
                    </h3>
                    <ol>
                        <div class="row mt-2">
                            <div class="col-2 mt-2">
                                <label for="taille" class="form-label"><li>Taille :</li></label>
                            </div>
                            <div class="col-1">
                                <input type="text" class="input_edit1" name="taille" id="taille">
                            </div>
                            <div class="col-1 mx-3">(cm)</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2 mt-2">
                                <label for="poids" class="form-label"><li>Poids :</li></label>
                            </div>
                            <div class="col-1">
                                <input type="text" class="input_edit1" name="poids" id="poids">
                            </div>
                            <div class="col-1 mx-3">(Kg)</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2 mt-2">
                                <label for="hauteur_poids" class="form-label"><li>Hauteur sur poids :</li></label>
                            </div>
                            <div class="col-1">
                                <input type="text" class="input_edit1" name="hauteur_poids" id="hauteur_poids">
                            </div>
                            <div class="col-1 mx-3">(Kg/m²)</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2 mt-2">
                                <label for="imc" class="form-label"><li>IMC :</li></label>
                            </div>
                            <div class="col-1">
                                <input type="text" class="input_edit1" name="imc" id="imc">
                            </div>
                            <div class="col-1 mx-3">(Kg/m²)</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2 mt-2">
                                <label for="empan" class="form-label"><li>Empan :</li></label>
                            </div>
                            <div class="col-1">
                                <input type="text" class="input_edit1" name="empan" id="empan">
                            </div>
                            <div class="col-1 mx-3">(cm)</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2 mt-2">
                                <label for="envergure" class="form-label"><li>Envergure :</li></label>
                            </div>
                            <div class="col-1">
                                <input type="text" class="input_edit1" name="envergure" id="envergure">
                            </div>
                            <div class="col-1 mx-3">(cm)</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2 mt-2">
                                <label for="pointure" class="form-label"><li>Pointure :</li></label>
                            </div>
                            <div class="col-1">
                                <input type="text" class="input_edit1" name="pointure" id="pointure">
                            </div>
                            <div class="col-1 mx-3">(cm)</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2 mt-2">
                                <label for="lateralite" class="form-label"><li>Latéralité :</li></label>
                            </div>
                            <div class="col-8 mt-2">
                                <div class="row">
                                    <div class="col-3 text-center mx-3">
                                        <span>
                                            <label for="gaucher" class="form-label">Gaucher : </label>
                                            <input type="radio" name="lateralite" id="gaucher" value="gaucher">
                                        </span>
                                    </div>
                                    <div class="col-2 text-center mx-3">
                                        <span>
                                            <label for="droitier" class="form-label">Droitier : </label>
                                            <input type="radio" name="lateralite" id="droitier" value="droitier">
                                        </span>
                                    </div>
                                    <div class="col-3 text-start mx-3">
                                        <span>
                                            <label for="ambidextre" class="form-label">Ambidextre : </label>
                                            <input type="radio" name="lateralite" id="ambidextre" value="ambidextre">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ol>
                </section>

                <!-- section III -evaluation des capacites physiques- -->
                <section>
                    <h3 class="text-start mt-3">
                        <strong><li>Evaluation des capacités physiques</li></strong>
                    </h3>
                    <ol>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="force" class="form-label"><li>Force :</li></label>
                            </div>
                            <div class="mt-2">
                                <div class="col-4 mt-2 d-inline">
                                    <label for="traction" class="form-label">Traction :</label>
                                </div>
                                <div class="col-2 text-center mx-3 d-inline">
                                    <span>
                                        <label for="pompe" class="form-label">Pompe : </label>
                                        <input type="radio" name="force" id="pompe" value="pompe">
                                    </span>
                                </div>
                                <div class="col-2 text-start mx-3 d-inline">
                                    <span>
                                        <label for="grimpe" class="form-label">Grimpé à la corde : </label>
                                        <input type="radio" name="force" id="grimpe" value="grimpe">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="vitesse" class="form-label"><li>Vitesse :</li></label>
                            </div>
                            <div class="mt-2">
                                <div class="col-4 mt-2 d-inline">
                                    <label for="lineaire" class="form-label">Linéaire :</label>
                                </div>
                                <div class="col-2 text-center mx-3 d-inline">
                                    <span>
                                        <label for="vitesse_reaction" class="form-label">5m -> vitesse de réaction : </label>
                                        <input type="radio" name="vitesse" id="vitesse_reaction" value="vitesse_reaction">
                                    </span>
                                </div>
                                <div class="col-2 text-start mx-3 d-inline">
                                    <span>
                                        <label for="vitesse_acceleration" class="form-label">20m -> vitesse d'accélération : </label>
                                        <input type="radio" name="vitesse" id="vitesse_acceleration" value="vitesse_acceleration">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="endurance" class="form-label"><li>Endurance :</li></label>
                            </div>
                            <div class="mt-2">
                                <div class="col-2 text-center d-inline">
                                    <span>
                                        <label for="course_navette" class="form-label">Course navette jouée : </label>
                                        <input type="radio" name="endurance" id="course_navette" value="course_navette">
                                    </span>
                                </div>
                                <div class="col-2 text-center mx-3 d-inline">
                                    <span>
                                        <label for="trente_quinze" class="form-label">30 - 15 (m) : </label>
                                        <input type="radio" name="endurance" id="trente_quinze" value="trente_quinze">
                                    </span>
                                </div>
                                <div class="col-2 text-start mx-3 d-inline">
                                    <span>
                                        <label for="test_yoyo" class="form-label">Test de Yoyo : </label>
                                        <input type="radio" name="endurance" id="test_yoyo" value="test_yoyo">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-3 mt-2">
                                <label for="test_detente" class="form-label"><li>Test de détente :</li></label>
                            </div>
                            <div class="col-2 mt-2 text-start d-inline">
                                <span>
                                    <label for="sargent_test" class="form-label">Sargent test : </label>
                                    <input type="checkbox" name="sargent_test" id="sargent_test" checked>
                                </span>
                            </div>
                            
                        </div>
                    </ol>
                </section>

                <!-- section IV -evaluation des competences techniques- -->
                <section>
                    <h3 class="text-start mt-2">
                        <strong><li>Evaluation des compétences techniques</li></strong>
                    </h3>
                    <ol>
                        <div class="row">
                            <div class="col-2"><li>Tir :</li></div>
                            <div class="col-4">Tir sur cible(fixe/mobile) : </div>
                            <div class="col-2">
                                <label for="tir_moyen" class="form-label">Moyen : </label>
                                <input type="radio" name="tir" id="tir_moyen" value="tir_moyen">
                            </div>
                            <div class="col-2">
                                <label for="tir_bon" class="form-label">Bon : </label>
                                <input type="radio" name="tir" id="tir_bon" value="tir_bon">
                            </div>
                            <div class="col-2">
                                <label for="tir_tres_bon" class="form-label">Très bon : </label>
                                <input type="radio" name="tir" id="tir_tres_bon" value="tir_tres_bon">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-2"><li>Dribble :</li></div>
                            <div class="col-4">Slalom linéaire : </div>
                            <div class="col-2">
                                <label for="dribble_moyen" class="form-label">Moyen : </label>
                                <input type="radio" name="dribble" id="dribble_moyen" value="dribble_moyen">
                            </div>
                            <div class="col-2">
                                <label for="dribble_bon" class="form-label">Bon : </label>
                                <input type="radio" name="dribble" id="dribble_bon" value="dribble_bon">
                            </div>
                            <div class="col-2">
                                <label for="dribble_tres_bon" class="form-label">Très bon : </label>
                                <input type="radio" name="dribble" id="dribble_tres_bon" value="dribble_tres_bon">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2"><li>Feinte :</li></div>
                            <div class="col-4">Situation de 1 # 1 :</div>
                            <div class="col-2">
                                <label for="fente_moyen" class="form-label">Moyen : </label>
                                <input type="radio" name="feinte" id="fente_moyen" value="feinte_moyen">
                            </div>
                            <div class="col-2">
                                <label for="fente_bon" class="form-label">Bon : </label>
                                <input type="radio" name="feinte" id="fente_bon" value="feinte_bon">
                            </div>
                            <div class="col-2">
                                <label for="fente_tres_bon" class="form-label">Très bon : </label>
                                <input type="radio" name="feinte" id="fente_tres_bon" value="feinte_tres_bon">
                            </div>
                        </div>
                    </ol>
                </section>

                <!-- section V -evaluation des compétences tactiques- -->
                <section>
                    <h3 class="text-start mt-3">
                        <strong><li>Evaluation des compétences tactiques</li></strong>
                    </h3>
                    <!-- evaluation des competences tactiques sans tableau -->
                    <!--
                    <ol>
                        <div class="col-2 mb-2"><li>Adaptation au jeu :</li></div>
                        <div class="col-3 d-inline mx-2">
                            <label for="non_participe" class="form-label">Ne participe pas au jeu : </label>
                            <input type="radio" name="participe_jeu" id="non_participe">
                        </div>
                        <div class="col-3 d-inline mx-2">
                            <label for="participe" class="form-label">Participe au jeu : </label>
                            <input type="radio" name="participe_jeu" id="participe">
                        </div>
                        <div class="col-3 d-inline mx-2">
                            <label for="participe_toutes_phases" class="form-label">Participe à toutes les phases du jeu : </label>
                            <input type="radio" name="participe_jeu" id="participe_toutes_phases">
                        </div>
                        -->
                        <!--    
                        <div class="col-2 my-2"><li>Prise de décision :</li></div>
                        <ol type="i">
                            <div class="row">
                                <div class="col-3"><li>Tir au but face au Gardien:</li></div>
                                <div class="col-2">
                                    <label for="tir_face_gardien_moyen" class="form-label">Moyen : </label>
                                    <input type="radio" name="tir_face_gardien" id="tir_face_gardien_moyen">
                                </div>
                                <div class="col-2">
                                    <label for="tir_face_gardien_bon" class="form-label">Bon : </label>
                                    <input type="radio" name="tir_face_gardien" id="tir_face_gardien_bon">
                                </div>
                                <div class="col-2">
                                    <label for="tir_tres_bon" class="form-label">Très bon : </label>
                                    <input type="radio" name="tir_face_gardien" id="tir_face_gardien_tbon">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-3"><li>Passe :</li></div>
                                <div class="col-2">
                                    <label for="passe_moyen" class="form-label">Moyen : </label>
                                    <input type="radio" name="passe" id="passe_moyen">
                                </div>
                                <div class="col-2">
                                    <label for="passe_bon" class="form-label">Bon : </label>
                                    <input type="radio" name="passe" id="passe_bon">
                                </div>
                                <div class="col-2">
                                    <label for="passe_tbon" class="form-label">Très bon : </label>
                                    <input type="radio" name="passe" id="passe_tbon">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3"><li>Tir :</li></div>
                                <div class="col-2">
                                    <label for="tir_decision_moyen" class="form-label">Moyen : </label>
                                    <input type="radio" name="tir_decision" id="tir_decision_moyen">
                                </div>
                                <div class="col-2">
                                    <label for="tir_decision_bon" class="form-label">Bon : </label>
                                    <input type="radio" name="tir_decision" id="tir_decision_bon">
                                </div>
                                <div class="col-2">
                                    <label for="tir_decision_tbon" class="form-label">Très bon : </label>
                                    <input type="radio" name="tir_decision" id="tir_decision_tbon">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3"><li>Montée / Repli :</li></div>
                                <div class="col-2">
                                    <label for="monte_repli_moyen" class="form-label">Moyen : </label>
                                    <input type="radio" name="monte_repli" id="monte_repli_moyen">
                                </div>
                                <div class="col-2">
                                    <label for="monte_repli_bon" class="form-label">Bon : </label>
                                    <input type="radio" name="monte_repli" id="monte_repli_bon">
                                </div>
                                <div class="col-2">
                                    <label for="monte_repli_tbon" class="form-label">Très bon : </label>
                                    <input type="radio" name="monte_repli" id="monte_repli_tbon">
                                </div>
                            </div>
                        </ol>
                    </ol>
                    -->

                    <!-- evaluation des competences tactiques avec tableau -->
                    <ol>
                        <li>Adaptation au jeu</li>
                        <table class="table table-striped table-secondary">
                            <tr>
                                <td>Ne participe pas au jeu</td>
                                <td>Participe au jeu</td>
                                <td>Participe à toutes les phases du jeu</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="participe" id="ne_participe" value="ne_participe"></td>
                                <td><input type="radio" name="participe" id="participe" value="participe"></td>
                                <td><input type="radio" name="participe" id="participe_toutes_phases" value="participe_toutes_phases"></td>
                            </tr>
                        </table>

                        <li>Prise de décision</li>
                        <table class="table table-secondary table-striped">
                            <tr>
                                <td colspan="3">Tir au but face au Gardien</td>
                                <td colspan="3">Passe</td>
                                <td colspan="3">Tir</td>
                                <td colspan="3">Montée / Repli</td>
                            </tr>
                            <tr>
                                <td>Moy</td>
                                <td>Bon</td>
                                <td>Très bon</td>
                                <td>Moy</td>
                                <td>Bon</td>
                                <td>Très bon</td>
                                <td>Moy</td>
                                <td>Bon</td>
                                <td>Très bon</td>
                                <td>Moy</td>
                                <td>Bon</td>
                                <td>Très bon</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="tir_face_gardien" id="tir_face_gardien_moy" value="tir_face_gardien_moy"></td>
                                <td><input type="radio" name="tir_face_gardien" id="tir_face_gardien_bon" value="tir_face_gardien_bon"></td>
                                <td><input type="radio" name="tir_face_gardien" id="tir_face_gardien_tbon" value="tir_face_gardien_tbon"></td>
                                <td><input type="radio" name="passe" id="passe__moy" value="passe__moy"></td>
                                <td><input type="radio" name="passe" id="passe_bon" value="passe_bon"></td>
                                <td><input type="radio" name="passe" id="passe_tbon" value="passe_tbon"></td>
                                <td><input type="radio" name="tir_decision" id="tir_decision_moy" value="tir_decision_moy"></td>
                                <td><input type="radio" name="tir_decision" id="tir_decision_bon" value="tir_decision_bon"></td>
                                <td><input type="radio" name="tir_decision" id="tir_decision_tbon" value="tir_decision_tbon"></td>
                                <td><input type="radio" name="monte_repli" id="monte_repli_moy" value="monte_repli_moy"></td>
                                <td><input type="radio" name="monte_repli" id="monte_repli_bon" value="monte_repli_bon"></td>
                                <td><input type="radio" name="monte_repli" id="monte_repli_tbon" value="monte_repli_tbon"></td>
                            </tr>
                        </table>
                    </ol>
                </section>
                <section>
                    <h3 class="text-start mt-3">
                        <strong><li>Information de connexion: </li></strong>
                    </h3>
                    <div class="mt-3">
                        <label for="mail" class="form-label"><strong>Votre mail: </strong></label>
                        <input type="email" class="form-control" name="mail" id="mail" placeholder="john.doe@gmail.com" required>
                    </div>
                    <div class="mt-3">
                        <label for="motDePasse" class="form-label"><strong>Votre mot de passe: </strong></label>
                        <input type="password" class="form-control" name="motDePasse" id="motDePasse" placeholder="Ex: *****" required>
                    </div>
                    <div class="mt-3">
                        <input type="checkbox" name="connect" id="connect">
                        <label for="connect" class="form-label"><strong>Restez connecté</strong></label>
                    </div>
                </section>
            </ol>
            
            
            <hr class="my-4">
            <!-- le bouton envoyer  -->
            <div class="text-center m-4">
                <button type="submit" class="btn btn-primary w-25 p-2">S'inscrire</button>
            </div>
        </form>
    </main>
    
</body>
</html>
<script>

    //Cachez l'input de l'image et le déclencher suite à une action
    document.getElementById("photo4_4").addEventListener("click", function(){
        document.getElementById("photo_profil").click();
    });

    //Charger l'image au moment de la sélection
    function chargerImage(event) {
        const selectedFile = event.target.files[0];
        if (selectedFile) {
            // Afficher l'image sélectionnée
            document.getElementById('selectedImage').src = URL.createObjectURL(selectedFile);
            document.getElementById("text").style.display = "none";
        }
    }
</script>