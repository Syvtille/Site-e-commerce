<?php
//ajoute une bannière appelée banner.jpg dans assets/img
//Assurez-vous de remplacer les données de produits dans view/v-accueil.php par les données réelles de vos produits et d'ajouter une image de produit de démonstration dans le dossier assets/img nommée product-sample.jpg.
//ajouter logo.png
//utiliser une option "utilisar la même adresse de facturation"
$idUser=1;
$urlSite = "https://s4-gp98.kevinpecro.info/";
$nomSite = "Confi' Délice";

require_once('src/controllers/c-accueil.php');
require_once('src/controllers/c-post.php');
require_once('src/controllers/c-produits.php');
require_once('src/controllers/c-panier.php');
require_once('src/controllers/c-commander.php');
require_once('src/controllers/c-paiement.php');
require_once('src/controllers/c-backoffice.php');

require_once('SDK_exemple/accepte.php');
require_once('SDK_exemple/refuse.php');
require_once('SDK_exemple/annule.php');

if(isset($_GET['url']) && $_GET['url']){
    $url = rtrim($_GET['url'], '/');
    switch ($url){
        case 'back-office' :
            paiementBackoffice();
            break;
        case 'accepte':
            accepte();
            break;
        case 'refuse':
            refuse();
            break;
        case 'annule':
            annule();
            break;

        case 'paiement':
            paiement();
            break;
        case 'commander':
            commander();
            break;
        case 'panier':
            panier();
            break;
        case 'produit':
        case 'produits':
            produits();
            break;
        case 'post':
            post();
            break;
        default:
            accueil();
            break;
    }
}
else accueil();