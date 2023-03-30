<?php

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