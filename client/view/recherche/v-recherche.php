<h1>Recherche</h1>

<div class="container">
    <form id="search-form">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recherche" id="searchQuery" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="searchButton">Recherche</button>
            </div>
        </div>
    </form>

    <div class="results" style="height:400px;overflow:auto;">
        <table class="table table-striped" id="resultsTable">
            <thead class='thead-dark'>
            <tr>
                <th>Nom</th>
                <th>Date de création</th>
                <th>Catégorie</th>
                <th>Détails</th>
            </tr>
            </thead>
            <tbody>
            <!-- Les résultats de recherche seront insérés ici par JavaScript -->
            </tbody>
        </table>
    </div>

    <div id="pagination" class="mt-3">
        <button class="btn btn-secondary" id="previousButton" disabled>Précédent</button>
        <button class="btn btn-secondary" id="nextButton" disabled>Suivant</button>
        <span id="pageInfo"></span>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    var currentPage = 1;
    var totalPageCount = 1;

    function updatePaginationButtons() {
        var previousButton = document.getElementById('previousButton');
        var nextButton = document.getElementById('nextButton');

        previousButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPageCount;
    }

    function updatePageInfo() {
        var pageInfo = document.getElementById('pageInfo');
        pageInfo.textContent = 'Page ' + currentPage + ' / ' + totalPageCount;
    }

    function fetchResults() {
        var searchQuery = document.getElementById('searchQuery').value;
        var resultsTable = document.getElementById('resultsTable');

        fetch('https://recherche-entreprises.api.gouv.fr/search?q=' + searchQuery + '&page=' + currentPage + '&per_page=10')
            .then(response => response.json())
            .then(data => {
                // Supprimer les anciennes lignes de résultats
                while (resultsTable.rows.length > 1) {
                    resultsTable.deleteRow(1);
                }

                console.log(data.results);

                // Ajouter les nouvelles lignes de résultats
                data.results.forEach(enterprise => {
                    var newRow = resultsTable.insertRow();
                    newRow.insertCell(0).textContent = enterprise.nom_complet;
                    var dateCreation = moment(enterprise.date_creation).format('DD/MM/YYYY');
                    newRow.insertCell(1).textContent = dateCreation;
                    newRow.insertCell(2).textContent = enterprise.categorie_entreprise;
                    newRow.insertCell(3).innerHTML = '<a href="https://s4-gp98.kevinpecro.info/client/recherche/' + enterprise.siren + '" target="_blank">Voir Détails</a>';
                });

                totalPageCount = data.total_pages;
                updatePaginationButtons();
                updatePageInfo();
            })
            .catch(error => console.log(error));
    }

    document.getElementById('searchButton').addEventListener('click', function() {
        currentPage = 1;
        fetchResults();
    });

    document.getElementById('previousButton').addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            fetchResults();
        }
    });

    document.getElementById('nextButton').addEventListener('click', function() {
        if (currentPage < totalPageCount) {
            currentPage++;
            fetchResults();
        }
    });
</script>
