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
                    <a href="panier/<?=$panierProduit['id_produit']?>/" type="button" class="btn btn-danger btn-sm supprimerDuPanier">Supprimer</a>
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
</div>
