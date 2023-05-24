<?php

require_once('src/model.php');

function apiListe(){

    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        http_response_code(405);
        die('Méthode non autorisée');
    }

    //token = Y123so into base64 = WTIyM3Nv
    if(!isset($_POST['token']) || $_POST['token'] !== 'WTIyM3Nv'){
        http_response_code(401);
        die('Non autorisé');
    }

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