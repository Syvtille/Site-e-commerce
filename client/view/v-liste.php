<h1>Liste des Commandes API</h1>
<?php
$lstApi = array(
    array(
        "url" => "api/liste/",
        "param" => null,
        "method" => "POST",
        "statut" => 1,
    ),
    array(
        "url" => "api/commande/",
        "param" => null,
        "method" => "POST",
        "statut" => 1,
    ),
    array(
        "url" => "api/commande/",
        "param" => "idCommande",
        "method" => "POST",
        "statut" => 1,
    ),
    array(
        "url" => "api/paiement/",
        "param" => null,
        "method" => "POST",
        "statut" => 1,
    ),
    array(
        "url" => "api/paiement/",
        "param" => "idPaiement",
        "method" => "POST",
        "statut" => 1,
    ),
);

echo "<table class='table table-striped'>";
echo "<thead class='thead-dark'><tr><th>URL</th><th>Param</th><th>Method</th><th>Status</th></tr></thead>";
echo "<tbody>";

foreach ($lstApi as $commande) {
    echo "<tr>";
    echo "<td>" . $commande['url'] . "</td>";
    echo "<td>" . ($commande['param'] ? $commande['param'] : 'N/A') . "</td>";
    echo "<td>" . $commande['method'] . "</td>";
    echo "<td>" . ($commande['statut'] ? 'Active' : 'Inactive') . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
