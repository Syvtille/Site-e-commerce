<?php

require_once('src/model.php');

function paiement(){

    $menu['page'] = "paiement";

    $idPaiement = (isset($_GET['identifiant']) && $_GET['identifiant']) ? $_GET['identifiant'] : null;

    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');

    if (!$idPaiement) {
        $reponse = appelApi('paiement');
        $lstApi = json_decode($reponse, true);
        include('view/paiement/v-paiement.php');
    }
    else {
        $reponse = appelApi('paiement', ['idPaiement' => $idPaiement]);
        $lstApi = json_decode($reponse, true);
        include('view/paiement/v-paiement-detail.php');
    }

    include('view/inc/inc.footer.php');
}