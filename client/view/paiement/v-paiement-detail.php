<h1>Détail du paiement</h1>

<?php
echo "<table class='table table-striped'>";
echo "<thead class='thead-dark'><tr><th>Clé</th><th>Valeur</th></tr></thead>";
echo "<tbody>";

foreach ($lstApi as $key => $value) {
    if($key == "montant"){
        $value = number_format($value/100, 2, ',', ' ') . "€";
    }
    echo "<tr>";
    echo "<td>" . $key . "</td>";
    echo "<td>" . $value . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
