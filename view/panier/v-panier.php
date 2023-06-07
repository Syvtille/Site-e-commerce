<div class="container">
    <h1>Votre panier</h1>
    <table class="table panier-table">
        <thead>
        <tr>
            <th>Nom du produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Prix total</th>
            <th class="supprimerDuPanier"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $total = 0;
        foreach ($panierProduits as $panierProduit) :
            $prixTotal = $panierProduit['quantite'] * $panierProduit['prix'];
            $total += $prixTotal;
            ?>
            <tr>
                <td><?= $panierProduit['nom'] ?></td>
                <td><?= $panierProduit['quantite'] ?></td>
                <td><?= $panierProduit['prix'] ?> €</td>
                <td><?= $prixTotal ?> €</td>
                <td>
                    <a href="panier/<?= $panierProduit['id_produit'] ?>/" type="button"
                       class="btn btn-danger btn-sm supprimerDuPanier">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 448 512">
                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>svg {
                                    fill: #ffffff
                                }</style>
                            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th><?= $total ?> €</th>
        </tr>
        </tfoot>
    </table>

    <tr class="validate-cart-btn">
        <td colspan="5">
            <div class="add-cart-container">
                <a href="commander/" type="button" class="btn btn-primary button-add-cart"><p>Valider le panier</p></a>
                <div class="drip-1"></div>
                <div class="drip-2"></div>
                <div class="drip-3"></div>
            </div>
        </td>
    </tr>
</div>
