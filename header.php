<style>
    #search{
        border: 0; 
    }
    #bar{
        border-radius: 10px;
    }
    #h-bar{
        justify-content: space-between;
    }
    #profil{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: px solid #fff;
    }
    a[alt^='el_a']{
        text-decoration: none;
        color: black;
    }
    #person{
        background-color: rgb(238, 238, 238);
        border-radius: 20px;
    }
    #bouton{
        background-color: blue;
    }
</style>
<section class="container px-5 mx-auto">
    <div class="row ml-4 d-flex justify-content-between" id="h-bar">
        <div class="col-lg-4 col-md-4 col-12 border px-3 mt-3" id="bar">
            <div class="row">
                <div class="col-4">
                    <form action="#" method="post">
                        <input type="text" size="30%" name="search" id="search" placeholder="Rechercher un club de HandBall" class="fa fa-search py-2">
                    </form>
                </div>
                <div class="col-8 text-right">
                    <span><i class="fa fa-search py-2 text-end"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12 text-lg-end mt-3">
            <div class="row">
                <div class="col-4 text-right mt-2">
                    <i class="fa fa-bell-o px-1" style="font-size: 20px;"></i>
                    <i class="fa fa-comment-o px-1" style="font-size: 20px;"></i>
                </div>
                <div class="col-2">
                    <?php if(!empty($_SESSION['profil']) && isset($_SESSION['profil'])){ ?>
                        <img src="images/img-joueur/<?=$_SESSION['profil']?>" alt="" class="img my-auto" id="profil">
                    <?php }else{ ?>
                        <i class="fa fa-user" style="font-size: 30px;"></i>
                    <?php } ?>
                </div>
                <div class="col-4">
                    <div class="row d-flex justify-content-between mt-2">
                        <div class="col-4">
                            HandBall
                        </div>
                        <div class="col-4">
                            <i class="fa fa-angle-down px-1" style="font-size: 20px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr width="95%">
</section>