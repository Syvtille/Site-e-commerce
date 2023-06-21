<h1>Recherche</h1>

<div class="container">
    <form action="" method="POST">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recherche" name="query" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Recherche</button>
            </div>
        </div>
    </form>

    <div class="results" style="height:400px;overflow:auto;">
        <table class="table table-striped">
            <thead class='thead-dark'>
            <tr><th>ID</th><th>Montant</th><th>Date</th><th>Référence</th><th>Action</th></tr>
            </thead>
            <tbody>
            <?php
            if (isset($_POST['query'])) {
                $query = $_POST['query'];
                // À remplacer par la logique d'appel à votre API pour obtenir les résultats en fonction de la recherche.
                // $results = call_your_api($query);
                $results = [];  // mock

                foreach ($results as $result) {
                    echo "<tr>";
                    echo "<td>" . $result['id_paiement'] . "</td>";
                    echo "<td>" . number_format($result['montant'] / 100, 2, ',', ' ') . "€</td>";
                    echo "<td>" . $result['date_paiement'] . "</td>";
                    echo "<td>" . $result['id_unique'] . "</td>";
                    echo '<td><a href="'.$urlSiteClient . 'paiement/' . $result['id_paiement'] . '/" class="btn btn-info">Voir Détails</a></td>';
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
