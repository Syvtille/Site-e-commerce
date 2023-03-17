<?php

$idUser=1;

require_once('src/controllers/c-accueil.php');
require_once('src/controllers/c-post.php');
require_once('src/controllers/c-produits.php');

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