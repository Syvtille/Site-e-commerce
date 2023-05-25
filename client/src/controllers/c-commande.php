<?php

require_once('src/model.php');

function commande(){

    appelApi('commande');

    $menu['page'] = "commande";

    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/commande/v-commande.php');
    include('view/inc/inc.footer.php');
}