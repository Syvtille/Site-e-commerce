<?php

require_once('src/model.php');

function accueil(){
    $menu['page'] = 'accueil';


    $lstProduits = get_results("SELECT * FROM produit WHERE statut=1");
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/v-accueil.php');
    include('view/inc/inc.footer.php');
}