<?php

function recherche(){

    $menu['page'] = "recherche";

    $urlApiGouvEntreprise = 'https://recherche-entreprises.api.gouv.fr/search?q=la%20poste&page=1&per_page=1';

    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/recherche/v-recherche.php');
    include('view/inc/inc.footer.php');
}

function rechercheEntreprise($query){

}

function rechercheAnnuaire($query){

}

function initCurl($url, $query){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url . $query);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    return $curl;
}