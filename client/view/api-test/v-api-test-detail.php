<h1>Détails du Test API</h1>

<?php
echo "<table class='table table-striped'>";
echo "<thead class='thead-dark'><tr><th>Clé</th><th>Valeur</th></tr></thead>";
echo "<tbody>";

foreach ($test as $key => $value) {
    echo "<tr>";
    echo "<td>" . $key . "</td>";
    echo "<td>" . $value . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
