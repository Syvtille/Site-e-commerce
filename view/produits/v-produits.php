<!--    <h1>--><?php //=$unProduits['nom']?><!--</h1>-->
<!--    <p>--><?php //=$unProduits['description']?><!--</p>-->
<!--    <p>--><?php //=$unProduits['prix']?><!-- €</p>-->

<div class="container produit-container">
    <div class="produit-nom col-12">
        <h5 class="card-title"><?= $unProduits['nom'] ?></h5>
    </div>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 col-12">
        <div class="col">
            <img src="assets/img/<?= $unProduits['image'] ?>" alt="<?= $unProduits['nom'] ?>">
        </div>
        <div class="col">
            <p class="card-text"><?= $unProduits['description'] ?></p>
            <form class="col" method="post">
                <div class="">
                    <label for="quantite">Quantité</label>
                    <input type="number" name="produit_quantite" id="quantite" class="form-control" value="1" min="1"
                           max="<?= $unProduits['stock'] ?>">
                </div>
                <input type="hidden" name="id_produit" value="<?= $unProduits['id'] ?>">
                <div class="">
                    <input type="submit" value="Ajouter au panier" class="btn btn-primary" name="ajouter_panier">
                </div>
            </form>
        </div>

    </div>
</div>
