<?php

require_once('src/controllers/c-accueil.php');
require_once('src/controllers/c-post.php');

if(isset($_GET['url']) && $_GET['url']){
    $url = rtrim($_GET['url'], '/');
    switch ($url){
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