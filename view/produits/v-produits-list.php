<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($lstProduits as $unProduits): ?>
            <div class="col">
                <div class="card shadow-sm">
                    <div class="image-produit">
                        <img src="<?=$unProduits['image']?>" alt="<?=$unProduits['nom']?>"
                    </div>

                    <div class="card-body">
                        <p class="card-title">
                            <strong><?=$unProduits['nom']?></strong>
                        </p>
                        <p class="card-text">
                            <?=$unProduits['description']?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="produits/<?=$unProduits['identifiant']?>/" class="btn btn-sm btn-outline-secondary">Ajouter au Panier</a>
                            </div>
                            <p><strong><?=$unProduits['prix']?> €</strong></p>
                            <small class="text-muted">En stock : <?=$unProduits['stock']?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
