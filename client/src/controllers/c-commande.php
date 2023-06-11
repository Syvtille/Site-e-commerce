<?php

require_once('src/model.php');

function commande(){

    $menu['page'] = "commande";

    $idCommande = (isset($_GET['identifiant']) && $_GET['identifiant']) ? $_GET['identifiant'] : null;

    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');

    if (!$idCommande) {
        $reponse = appelApi('commande');
        $lstApi = json_decode($reponse, true);
        include('view/commande/v-commande.php');
    }
    else {
        $reponse = appelApi('commande', ['idCommande' => $idCommande]);
        $lstApi = json_decode($reponse, true);
        include('view/commande/v-commande-detail.php');
    }

    include('view/inc/inc.footer.php');
}