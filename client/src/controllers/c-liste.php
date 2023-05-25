<?php

require_once('src/model.php');

function liste(){

    $reponse = appelApi('liste');

    $lstApi = json_decode($reponse, true);

    $menu['page'] = "liste";

    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/v-liste.php');
    include('view/inc/inc.footer.php');
}
