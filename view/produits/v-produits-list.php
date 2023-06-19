<div class="album py-5">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-3 .produits-populaires">
            <?php foreach($lstProduits as $unProduits): ?>
                <div class="col">
                    <div class="card accueil-card-produit">
                        <img src="assets/img/<?=$unProduits['image']?>" alt="<?=$unProduits['nom']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=$unProduits['nom']?></h5>
                            <p class="accueil-prix-produit"><strong><?=$unProduits['prix']?> €</strong></p>
                        </div>
                        <div class="card-footer">
                            <div class="add-cart-container">
                                <a href="produits/<?=$unProduits['identifiant']?>/" class="btn btn-primary button-add-cart">
                                    <p>Ajouter au panier</p>
                                </a>
                                <div class="drip-1"></div>
                                <div class="drip-2"></div>
                                <div class="drip-3"></div>
                            </div>
                            <small>En stock : <?=$unProduits['stock']?></small>
                        </div>
                        <span class="top"></span>
                        <span class="right"></span>
                        <span class="bottom"></span>
                        <span class="left"></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
<!--        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">-->
<!--            --><?php //foreach($lstProduits as $unProduits): ?>
<!--            <div class="col">-->
<!--                <div class="card shadow-sm">-->
<!--                    <div class="image-produit">-->
<!--                        <img src="assets/img/--><?php //=$unProduits['image']?><!--" alt="--><?php //=$unProduits['nom']?><!--"-->
<!--                    </div>-->
<!---->
<!--                    <div class="card-body">-->
<!--                        <p class="card-title">-->
<!--                            <strong>--><?php //=$unProduits['nom']?><!--</strong>-->
<!--                        </p>-->
<!--                        <p class="card-text">-->
<!--                            --><?php //=$unProduits['description']?>
<!--                        </p>-->
<!--                        <div class="d-flex justify-content-between align-items-center">-->
<!--                            <div class="btn-group">-->
<!--                                <a href="produits/--><?php //=$unProduits['identifiant']?><!--/" class="btn btn-sm btn-outline-secondary">Ajouter au Panier</a>-->
<!--                            </div>-->
<!--                            <p><strong>--><?php //=$unProduits['prix']?><!-- €</strong></p>-->
<!--                            <small class="text-muted">En stock : --><?php //=$unProduits['stock']?><!--</small>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            --><?php //endforeach; ?>
<!--        </div>-->
    </div>
</div>
