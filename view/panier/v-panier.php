<?php
session_start();
?>

<div class="container">
    <h1>Votre panier</h1>

    <?php if(empty($_SESSION['panier'])) : ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>

        <table class="table">
            <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Prix total</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['panier'] as $idProduit => $quantite) : ?>
                <?php
                // Récupération des informations du produit depuis la base de données
                $requete = $bdd->prepare('SELECT * FROM produits WHERE id = ?');
                $requete->execute([$idProduit]);
                $produit = $requete->fetch();
                $requete->closeCursor();

                // Calcul du prix total pour ce produit
                $prixTotalProduit = $produit['prix'] * $quantite;
                ?>
                <tr>
                    <td><?= $produit['nom'] ?></td>
                    <td><?= $produit['prix'] ?> €</td>
                    <td><?= $quantite ?></td>
                    <td><?= $prixTotalProduit ?> €</td>
                    <td><a href="supprimer-produit.php?id=<?= $idProduit ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total :</strong></td>
                <td colspan="2"><strong><?= array_sum(array_map(function($quantite, $idProduit) use ($bdd) {
                            $requete = $bdd->prepare('SELECT prix FROM produits WHERE id = ?');
                            $requete->execute([$idProduit]);
                            $prix = $requete->fetchColumn();
                            $requete->closeCursor();
                            return $quantite * $prix;
                        }, $_SESSION['panier'], array_keys($_SESSION['panier']))) ?> €</strong></td>
            </tr>
            </tbody>
        </table>

    <?php endif; ?>
</div>
