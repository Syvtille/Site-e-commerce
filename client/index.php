<?php

$urlRequete = 'https://s4-gp98.kevinpecro.info/api/';
$urlSiteClient = 'https://s4-gp98.kevinpecro.info/client/';

require_once('src/controllers/c-liste.php');
require_once('src/controllers/c-commande.php');
require_once('src/controllers/c-paiement.php');

if(isset($_GET['url']) && $_GET['url']) {
    $url = rtrim($_GET['url'], '/');
    if($url) {
        switch ($url) {
            case 'paiement':
                paiement();
                break;
            case 'commande':
                commande();
                break;
            default:
                liste();
                break;
        }
    } else liste();
} else liste();