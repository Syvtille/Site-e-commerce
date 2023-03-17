<div class="cart">
    <h2>Panier</h2>
    <table>
        <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Total</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Boucle pour afficher les produits du panier
        foreach ($panier as $produit) {
        $total = $produit['prix'] * $produit['quantite'];
        ?>
        <tr>
            <td><?php echo $produit['nom']; ?></td>
            <td><?php echo $produit['quantite']; ?></td>
            <td><?php echo $produit['prix']; ?></td>
            <td><?php echo $total; ?></td>
            <td>
                <form method="post" action="supprimerPanier.php">
                    <input type="hidden" name="id" value="<?php echo $produit['id']; ?>">
                    <input type="submit" value="Supprimer">
                </form>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <p>Total : <?php echo $totalPanier; ?></p>
    <a href="index.php">Retour à l'accueil</a>
</div>

