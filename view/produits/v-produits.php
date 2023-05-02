<!--    <h1>--><?php //=$unProduits['nom']?><!--</h1>-->
<!--    <p>--><?php //=$unProduits['description']?><!--</p>-->
<!--    <p>--><?php //=$unProduits['prix']?><!-- €</p>-->

<div class="container produit-container">
    <div class="produit-nom col-12">
        <h4 class="card-title"><?= $unProduits['nom'] ?></h4>
    </div>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 col-12">
        <div class="col">
            <img src="assets/img/<?= $unProduits['image'] ?>" alt="<?= $unProduits['nom'] ?>">
        </div>
        <div class="col produit-container-right-part">
            <p class="card-text produit-description"><?= $unProduits['description'] ?></p>
            <form class="col form-produit" method="post">
                <div class="">
                    <label for="quantite">Quantité</label>
                    <div class="quantite-prix">
                        <input type="number" name="produit_quantite" id="quantite" class="quantite-input form-control"
                               value="1" min="1"
                               max="<?= $unProduits['stock'] ?>">
                        <p class="produit-prix"><strong><?= $unProduits['prix'] ?> €</strong></p>
                    </div>
                </div>
                <input type="hidden" name="id_produit" value="<?= $unProduits['id'] ?>">
                <div class="add-cart-container">
                    <input type="submit" value="Ajouter au panier" class="btn btn-primary button-add-cart"
                           name="ajouter_panier">
                    <div class="drip-1"></div>
                    <div class="drip-2"></div>
                    <div class="drip-3"></div>
                </div>
            </form>
        </div>

    </div>
</div>
