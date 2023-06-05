<h1>Liste des Tests API</h1>

<?php
echo "<table class='table table-striped'>";
echo "<thead class='thead-dark'><tr><th>ID</th><th>URL</th><th>Date/Heure</th><th>Code Erreur</th><th>Méthode</th><th>Action</th></tr></thead>";
echo "<tbody>";

foreach ($tests as $test) {
    echo "<tr>";
    echo "<td>" . $test['id'] . "</td>";
    echo "<td>" . $test['url'] . "</td>";
    echo "<td>" . $test['date_heure'] . "</td>";
    echo "<td>" . $test['code_erreur'] . "</td>";
    echo "<td>" . $test['methode'] . "</td>";
    echo '<td><a href="c-api-test.php?id=' . $test['id'] . '" class="btn btn-info">Voir Détails</a></td>';
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
