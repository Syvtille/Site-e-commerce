<?php
echo "<table border='1'>";
echo "<tr><th>id</th><th>nom</th><th>result</th></tr>";
foreach ($lstTests as $unTest) {
    echo "<tr>";
    echo "<td>" . $unTest['idProduit'] . "</td>";
    echo "<td>" . $unTest['nom'] . "</td>";
    echo "<td>" . $unTest['result'] . "</td>";
    echo "</tr>";
}
echo "</table>";
