<?php
require_once('src/model.php');

function paiement(){
    $menu['page'] = "paiement";
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/paiement/v-paiement.php');
    require('view/inc/inc.footer.php');
}
