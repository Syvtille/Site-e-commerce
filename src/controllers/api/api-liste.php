<?php

require_once('src/model.php');

function apiListe(){

    authApi();

    $lstApi = array(
        array(
            "url" => "api/liste/",
            "param" => null,
            "method" => "POST",
            "statut" => 1,
        ),
        array(
            "url" => "api/commande/",
            "param" => null,
            "method" => "POST",
            "statut" => 1,
        ),
        array(
            "url" => "api/commande/",
            "param" => "idCommande",
            "method" => "POST",
            "statut" => 1,
        ),
        array(
            "url" => "api/paiement/",
            "param" => null,
            "method" => "POST",
            "statut" => 1,
        ),
        array(
            "url" => "api/paiement/",
            "param" => "idPaiement",
            "method" => "POST",
            "statut" => 1,
        ),
    );

    echo json_encode($lstApi);
}