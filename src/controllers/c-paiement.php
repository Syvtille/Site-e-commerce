<?php
require_once('src/model.php');

function paiement($total, $idCommande){

    $total = str_replace(",", "", $total);
    $total = str_replace(".", "", $total);

    $pbx_site = '3277512';
    $pbx_total = $total;
    $pbx_identifiant = '38023694';
    $pbx_rang = '001';
    $hmackey = 'BA17D491C851E427024E9F3017CE92A9EDC0D79B4E4370FD05B9956F52844F832218444330 AA8C9E4D4123422528B68C166783F75888919DC56C95524A2D6C56';
    $serveurs = array('tpeweb.e-transactions.fr', //serveur primaire
        'tpeweb1.e-transactions.fr'); //serveur secondaire
    $serveurOK = 'recette-tpeweb.e-transactions.fr';

    $pbx_cmd = '22gp98-'. $idCommande;
    $pbx_porteur = 'test@test.fr';												//variable de test test@test.fr

    // Param�trage des urls de redirection navigateur client apr�s paiement
    $pbx_effectue = 'https://www.s4-gp98.kevinpecro.info/accepte';
    $pbx_annule = 'https://www.s4-gp98.kevinpecro.info/annule';
    $pbx_refuse = 'https://www.s4-gp98.kevinpecro.info/refuse';
    // Param�trage de l'url de retour back office site
    $pbx_repondre_a = 'https://www.s4-gp98.kevinpecro.info/back-office/';

    $pbx_retour = 'Mt:M;Ref:R;TypeCarte:C;CodeReponse:E;';
    $pbx_ruf1 = "POST";

    $menu['page'] = "paiement";
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/paiement/v-paiement.php');
    require('view/inc/inc.footer.php');


//    require_once('view/inc/inc.head.php');
//    require_once('view/inc/inc.header.php');
//    require_once('SDK_exemple/formulaire_HMAC_iFrame.php');
//    require_once('view/paiement/v-paiement.php');
//    require_once('view/inc/inc.footer.php');
}
