<?php
function recherche()
{
    $menu['page'] = "recherche";

    $idPaiement = (isset($_GET['identifiant']) && $_GET['identifiant']) ? $_GET['identifiant'] : null;

    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/recherche/v-recherche.php');
    include('view/inc/inc.footer.php');
}
