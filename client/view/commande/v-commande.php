<h1>Liste des Commandes</h1>

<?php
global $urlSiteClient;
echo "<table class='table table-striped'>";
echo "<thead class='thead-dark'><tr><th>ID</th><th>ID Client</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Statut</th><th>Action</th></tr></thead>";
echo "<tbody>";

foreach ($lstApi as $commande) {
    echo "<tr>";
    echo "<td>" . $commande['id'] . "</td>";
    echo "<td>" . $commande['id_client'] . "</td>";
    echo "<td>" . $commande['nom'] . "</td>";
    echo "<td>" . $commande['prenom'] . "</td>";
    echo "<td>" . $commande['email'] . "</td>";
    echo "<td>" . ($commande['statut'] ? 'Active' : 'Inactive') . "</td>";
    echo '<td><a href="'.$urlSiteClient . 'commande/' . $commande['id'] . '/" class="btn btn-info">Voir Détails</a></td>';
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
