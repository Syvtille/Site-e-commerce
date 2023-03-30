<div class="container">
    <h1>Votre panier</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Nom du produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Prix total</th>
            <th class="supprimerDuPanier"><!--empty on purpose--></th>
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
                    <button href="" type="button" class="btn btn-danger btn-sm supprimerDuPanier" data-id="<?= $panierProduit['id'] ?>">Supprimer</button>
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
