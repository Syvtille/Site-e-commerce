<?php
//ajoute une bannière appelée banner.jpg dans assets/img
//Assurez-vous de remplacer les données de produits dans view/v-accueil.php par les données réelles de vos produits et d'ajouter une image de produit de démonstration dans le dossier assets/img nommée product-sample.jpg.
$idUser=1;
$urlSite = "https://s4-gp98.kevinpecro.info/";

require_once('src/controllers/c-accueil.php');
require_once('src/controllers/c-post.php');
require_once('src/controllers/c-produits.php');
require_once('src/controllers/c-panier.php');

if(isset($_GET['url']) && $_GET['url']){
    $url = rtrim($_GET['url'], '/');
    switch ($url){
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