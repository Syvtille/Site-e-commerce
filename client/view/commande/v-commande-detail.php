<h1>Détails de la Commande</h1>

<div class="col-md-12">
    <div class="product-details mr-2">
        <hr>
        <h3 class='thead-dark mb-0'>Récapitulatif</h3>
        <table class='table table-striped'>
            <thead class='thead-dark'><tr><th>Nom</th><th>Image</th><th>Quantité</th></tr></thead>
            <tbody>
            <?php
            foreach ($lstApi["produits"] as $item):
                ?>
                <tr>
                    <td><?= $item['nom'] ?></td>
                    <td><img class="rounded" src="../assets/img/<?= $item['image'] ?>" width="100"></td>
                    <td><?= $item['quantite'] ?></td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php
echo "<h3 class='thead-dark mb-0'>Informations</h3>";
echo "<table class='table table-striped'>";
echo "<thead class='thead-dark'><tr><th>Clé</th><th>Valeur</th></tr></thead>";
echo "<tbody>";

foreach ($lstApi as $key => $value) {
    echo "<tr>";
    echo "<td>" . $key . "</td>";
    if ($key == "total") {
        echo "<td>" . $value . "€</td>";
        echo "</tr>";
        break;
    }
    echo "<td>" . $value . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>


