<?php
global $nomSite;
?>

<!--<div class="banner">-->
<!--    <h2>Bienvenue sur --><?php //= $nomSite; ?><!-- !</h2>-->
<!--</div>-->

<!--carousel-->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner carousel-accueil">
        <div class="carousel-item active">
            <img src="../assets/img/banner-nouveaute.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../assets/img/banner-fraise.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../assets/img/banner-fructose.png" class="d-block w-100" alt="...">
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

<div class="container">
    <h1>Produits populaires</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!-- Vous pouvez remplacer ces données par les données réelles de vos produits -->
        <?php for ($i = 0; $i < 6; $i++): ?>
            <div class="col">
                <div class="card">
                    <img src="assets/img/product-sample.jpg" alt="Product Name">
                    <div class="card-body">
                        <h5 class="card-title">Nom du produit</h5>
                        <p class="card-text">Description du produit</p>
                        <p><strong>99.99 €</strong></p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Ajouter au panier</a>
                        <small>En stock : 10</small>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>

<footer>
    &copy; <?= date("Y"); ?> <?= $nomSite; ?>. Tous droits réservés.
</footer>
