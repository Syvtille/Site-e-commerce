<?php
global $nomSite;
?>
<div class="banner">
    <h2>Bienvenue sur <?= $nomSite; ?> !</h2>
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
    &copy; <?= date("Y"); ?> <?=$nomSite; ?>. Tous droits réservés.
</footer>
