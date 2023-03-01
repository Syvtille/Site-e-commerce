<?php

require('src/model.php');

function accueil(){
    $menu['page'] = 'accueil';

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/inc/inc.footer.php');
    include('view/v-accueil.php');
}