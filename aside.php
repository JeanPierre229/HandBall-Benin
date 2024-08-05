<style>
    .act{
        background-color: rgb(238, 238, 238);
        padding: 15px;
        border-radius: 10px;
    }
    .h5{
        font-size: 16px;
    }
</style>
<aside class="col-1">
    <div >
        <div class="text-center pb-2 my-1 <?php if(!empty($el) && $el === "accueil"): ?> act <?php endif ?>">
            <a href="accueil.php" alt='el_a'>
                <i class="fa fa-home" style="font-size: 25px; color:blue;"></i>
                <p class="h5">Accueil</p>
            </a>
        </div>
        <div class="text-center pb-2 my-1 <?php if(!empty($el) && $el === "adhesion"): ?> act <?php endif ?>">
            <a href="adhesion_club.php" alt='el_a'>
                <i class="fa fa-users"  style="font-size: 25px; color:blue;"></i>
                <p class="h5">Adhérer Club</p>
            </a>
        </div>
        <div class="text-center pb-2 my-2">
            <i class="fa fa-group" style="font-size: 25px; color:blue;"></i>
            <p class="h5">Nos Clubs</p>
        </div>
        <div class="text-center pb-2 my-1 <?php if(!empty($el) && $el === "seformer"): ?> act <?php endif ?>">
            <a href="seformer.php" alt='el_a'>
                <i class="fa fa-graduation-cap" style="font-size: 25px; color:blue;"></i>
                <p class="h5">Se former</p>
            </a>
        </div>
        <div class="text-center pb-2 my-1 <?php if(!empty($el) && $el === "achat"): ?> act <?php endif ?>">
            <a href="achat_equipement.php" alt='el_a'>
                <i class="fa fa-shopping-cart" style="font-size: 25px; color:blue;"></i>
                <p class="h5">Achat d'équipe <br>ments</p>
            </a>
        </div>
        <div class="text-center pb-2">
            <i class="fa fa-book" style="font-size: 25px; color:blue;"></i>
            <p class="h5">Blog</p>
        </div>
        <div class="text-center pb-2 my-1 <?php if(!empty($el) && $el === "nos_joueurs"): ?> act <?php endif ?>">
            <a href="nos_joueurs.php" alt='el_a'>
                <i class="fa fa-star-o" style="font-size: 25px; color:blue;"></i>
                <p class="h5">Nos joueurs</p>
            </a>
        </div>
        <div class="text-center">
            <?php
                if(!empty($_SESSION['mail'])){
            ?>
                <a href="deconnexion.php" alt='el_a'>
                    <i class="fa fa-sign-in" style="font-size: 25px; color:blue;"></i>
                    <p class="h5">Se Déconnecter</p>
                </a>
            <?php
                }else{
            ?>
                <a href="index.php" alt='el_a'>
                    <i class="fa fa-sign-in" style="font-size: 25px; color:blue;"></i>
                    <p class="h5">Se Connecter</p>
                </a>
            <?php } ?>
        </div>
    </div>
</aside>