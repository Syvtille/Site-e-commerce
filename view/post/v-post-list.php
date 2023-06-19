<div class="album py-5">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($lstPost as $unPost): ?>
            <div class="col">
                <div class="card shadow-sm blog-card">
                    <img class="blog-post-image" src="assets/img/<?=$unPost['image']?>" alt="<?=$unPost['titre']?>">

                    <div class="card-body">
                        <p class="card-text">
                            <?=$unPost['titre']?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="post/<?=$unPost['identifiant']?>/" class="btn btn-primary button-add-cart">Consulter</a>
                            </div>
                            <small class="text-muted"><?=$unPost['date_creation']?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>