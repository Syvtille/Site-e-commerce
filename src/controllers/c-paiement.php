<?php
require_once('src/model.php');
require_once('SDK_exemple/formulaire_HMAC_iFrame.php');

function paiement(){
    $pbx_site = '3277512';
    $pbx_identifiant = '38023694';
    $pbx_rang = '001';
    $hmackey = 'BA17D491C851E427024E9F3017CE92A9EDC0D79B4E4370FD05B9956F52844F832218444330 AA8C9E4D4123422528B68C166783F75888919DC56C95524A2D6C56';
    $serveurs = array('tpeweb.e-transactions.fr', //serveur primaire
        'tpeweb1.e-transactions.fr'); //serveur secondaire
    $serveurOK = 'recette-tpeweb.e-transactions.fr';

    $pbx_cmd = '22gp98-test'.uniqid();


    $menu['page'] = "paiement";
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/paiement/v-paiement.php');
    require('view/inc/inc.footer.php');
}
