<?php
global $nomSite;
?>

<!--<div class="banner">-->
<!--    <h2>Bienvenue sur --><?php //= $nomSite; ?><!-- !</h2>-->
<!--</div>-->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner carousel-accueil">
        <div class="carousel-item active">
            <img src="../assets/img/banner-nouveaute-min.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../assets/img/banner-fraise-min.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../assets/img/banner-fructose-min.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="accueil-produits">
    <div class="accueil-title-wrapper">
        <h2 class="accueil-title">À ne pas manquer</h2>
        <h3 class="accueil-subtitle">Découvrez nos coups de coeurs et nos nouveautés.</h3>
    </div>
    <!--    mettre les produits-->
</div>

<div class="container">
    <h1>Produits populaires</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-3 .produits-populaires">
        <?php foreach ($lstProduits as $unProduits): ?>
            <div class="col">
                <div onclick="window.location.href = 'produits/<?= $unProduits['identifiant'] ?>/';" class="card accueil-card-produit">
                    <img src="assets/img/<?= $unProduits['image'] ?>" alt="<?= $unProduits['nom'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $unProduits['nom'] ?></h5>
                        <p class="accueil-prix-produit"><strong><?= $unProduits['prix'] ?> €</strong></p>
                    </div>
                    <div class="card-footer">
                        <div class="add-cart-container">
                            <a href="produits/<?= $unProduits['identifiant'] ?>/"
                               class="btn btn-primary button-add-cart">
                                <p>Ajouter au panier</p>
                            </a>
                            <div class="drip-1"></div>
                            <div class="drip-2"></div>
                            <div class="drip-3"></div>
                        </div>
                        <small>En stock : <?= $unProduits['stock'] ?></small>
                    </div>
                    <span class="top"></span>
                    <span class="right"></span>
                    <span class="bottom"></span>
                    <span class="left"></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<br><br><br><br><br><br><br>
