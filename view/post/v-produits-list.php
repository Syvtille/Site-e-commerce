<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($lstproduits as $unProduits): ?>
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?=$unProduits['titre']?></text></svg>

                    <div class="card-body">
                        <p class="card-text">
                            <?=$unProduits['contenu'], 0, 100?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="produits/<?=$unProduits['identifiant']?>/" class="btn btn-sm btn-outline-secondary">Consulter</a>
                            </div>
                            <small class="text-muted"><?=$unProduits['date_creation']?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
