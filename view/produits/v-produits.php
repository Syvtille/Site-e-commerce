<?php
var_dump($unProduits);

?>
<div class="col-md-6 col-12">
    <h1><?=$unProduits['nom']?></h1>
    <p><?=$unProduits['description']?></p>
    <p><?=$unProduits['prix']?> €</p>
    <form class="row">
        <div class="col-12">
            <label for="quantite">Quantité</label>
            <input type="number" name="quantite" id="quantite" class="form-control" value="1" min="1" max="<?=$unProduits['stock']?>">
        </div>
        <div class="col-12">
            <input type="submit" value="Ajouter au panier" class="btn btn-primary">
        </div>
    </form>
</div>
