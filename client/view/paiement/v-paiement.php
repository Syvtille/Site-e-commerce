<h1>Liste des Commandes</h1>

<?php
global $urlSiteClient;
echo "<table class='table table-striped'>";
echo "<thead class='thead-dark'><tr><th>ID</th><th>Montant</th><th>Date</th><th>Référence</th></tr></thead>";
echo "<tbody>";

foreach ($lstApi as $paiement) {
    echo "<tr>";
    echo "<td>" . $paiement['id_paiement'] . "</td>";
    echo "<td>" . $paiement['montant'] . "</td>";
    echo "<td>" . $paiement['date_paiement'] . "</td>";
    echo "<td>" . $paiement['id_unique'] . "</td>";
    echo '<td><a href="'.$urlSiteClient . 'paiement/' . $paiement['id_paiement'] . '/" class="btn btn-info">Voir Détails</a></td>';
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
