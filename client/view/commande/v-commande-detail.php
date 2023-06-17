<h1>Détails de la Commande</h1>

<?php
echo "<table class='table table-striped'>";
echo "<thead class='thead-dark'><tr><th>Clé</th><th>Valeur</th></tr></thead>";
echo "<tbody>";

foreach ($lstApi as $key => $value) {
    echo "<tr>";
    echo "<td>" . $key . "</td>";
    echo "<td>" . $value . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>

<div class="product-details mr-2">
    <hr>
    <h6 class="mb-0">Récapitulatif</h6>
    <?php
    foreach($lstApi["produits"] as $item):
        ?>
        <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
            <div class="d-flex flex-row"><img class="rounded" src="<?=$item['image'] ?>" width="40">
                <div class="ml-2"><span class="font-weight-bold d-block"><?=$item['nom'] ?></span></div>
            </div>
            <div class="d-flex flex-row align-items-center"><span class="d-block">Quantité : <?=$item['quantite'] ?></span></div>
        </div>
    <?php
    endforeach;
    ?>
</div>

