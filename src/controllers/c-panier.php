<?php

require_once('src/model.php');

function panier(){
    $menu['page'] = "panier";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/panier/v-panier.php');
    include('view/inc/inc.footer.php');

}