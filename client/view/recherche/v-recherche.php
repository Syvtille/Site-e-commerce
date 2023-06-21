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

    <div class="pagination" id="pagination">
        <button class="btn btn-outline-secondary" id="previousButton">Précédent</button>
        <input type="number" class="form-control" placeholder="Numéro de page" id="pageNumberInput">
        <button class="btn btn-outline-secondary" id="goToPageButton">Aller</button>
        <br>
        <span id="pageInfo"></span>
        <button class="btn btn-outline-secondary" id="nextButton">Suivant</button>
    </div>

    <div class="details">
        <h2>Détails de l'entreprise</h2>
        <div id="detailsContent"></div>
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
                    var detailsButton = document.createElement('button');
                    detailsButton.classList.add('detailsButton');
                    detailsButton.setAttribute('data-siren', enterprise.siren);

                    // Stocker toutes les informations de l'entreprise dans le bouton
                    for (var key in enterprise) {
                        if (enterprise.hasOwnProperty(key) && key !== 'siren') {
                            detailsButton.setAttribute('data-' + key, enterprise[key]);
                        }
                    }

                    detailsButton.textContent = 'Voir Détails';
                    newRow.insertCell(3).appendChild(detailsButton);
                });

                totalPageCount = data.total_pages;
                updatePaginationButtons();
                updatePageInfo();
            })
            .catch(error => console.log(error));
    }

    function displayEnterpriseDetails(event) {
        if (event.target.classList.contains('detailsButton')) {
            var siren = event.target.getAttribute('data-siren');
            var detailsContent = document.getElementById('detailsContent');
            detailsContent.innerHTML = 'Numéro de SIREN : ' + siren;

            // Récupérer les autres informations de l'entreprise à partir de l'attribut data- du bouton
            var attributs = event.target.attributes;
            var details = '';
            for (var i = 0; i < attributs.length; i++) {
                var attribut = attributs[i];
                if (attribut.name.startsWith('data-') && attribut.name !== 'data-siren') {
                    details += attribut.name.substring(5) + ': ' + attribut.value + '<br>';
                }
            }

            // Afficher les autres informations de l'entreprise
            detailsContent.innerHTML += '<br>' + details;
        }
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

    document.getElementById('goToPageButton').addEventListener('click', function() {
        var pageNumberInput = document.getElementById('pageNumberInput');
        var pageNumber = parseInt(pageNumberInput.value);

        if (!isNaN(pageNumber) && pageNumber >= 1 && pageNumber <= totalPageCount) {
            currentPage = pageNumber;
            fetchResults();
        } else {
            pageNumberInput.value = currentPage;
        }
    });

    document.getElementById('resultsTable').addEventListener('click', displayEnterpriseDetails);
</script>
