<?php
require_once('src/model.php');

function paiement($total, $idCommande){

    $menu['page'] = "paiement";

    $total = str_replace(",", "", $total);
    $total = str_replace(".", "", $total);

    $pbx_site = '3277512';
    $pbx_total = $total;
    $pbx_identifiant = '38023694';
    $pbx_rang = '001';
    $hmackey = 'BA17D491C851E427024E9F3017CE92A9EDC0D79B4E4370FD05B9956F52844F832218444330AA8C9E4D4123422528B68C166783F75888919DC56C95524A2D6C56';

// --------------- TESTS DE DISPONIBILITE DES SERVEURS ---------------

    $serveurs = array('tpeweb.e-transactions.fr', //serveur primaire
        'tpeweb1.e-transactions.fr'); //serveur secondaire
    $serveurOK = "";
    foreach($serveurs as $serveur){
        $doc = new DOMDocument();
        $doc->loadHTMLFile('https://'.$serveur.'/load.html');
        $server_status = "";
        $element = $doc->getElementById('server_status');
        if($element){
            $server_status = $element->textContent;}
        if($server_status == "OK"){
    // Le serveur est pr�t et les services op�rationnels
            $serveurOK = $serveur;
            break;}
    // else : La machine est disponible mais les services ne le sont pas.
    }
    //curl_close($ch);
    if(!$serveurOK){
        die("Erreur : Aucun serveur n'a �t� trouv�");}
    // Activation de l'univers de recette
    $serveurOK = 'tpeweb.e-transactions.fr';

    //Cr�ation de l'url e-Transactions
    $serveurOK = 'https://'.$serveurOK.'/php/';
    echo "Serveur ".$serveurOK;
    echo "<br><br>";

    // Param�trage des urls de redirection navigateur client apr�s paiement
    $pbx_effectue = 'https://www.s4-gp98.kevinpecro.info/accepte';
    $pbx_annule = 'https://www.s4-gp98.kevinpecro.info/annule';
    $pbx_refuse = 'https://www.s4-gp98.kevinpecro.info/refuse';
    // Param�trage de l'url de retour back office site
//    $pbx_repondre_a = 'https://www.s4-gp98.kevinpecro.info/back-office/' . $idCommande . '/';
    $pbx_repondre_a = 'https://www.s4-gp98.kevinpecro.info/back-office/';

    $dateTime = date("c");

    $pbx_nb_produit = '5';									//variable de test 5
    $pbx_shoppingcart = "<?xml version=\"1.0\" encoding=\"utf-8\"?><shoppingcart><total><totalQuantity>".$pbx_nb_produit."</totalQuantity></total></shoppingcart>";

    $pbx_cmd = '22gp98-'. $idCommande;
    $pbx_porteur = 'escande.florian.chatco@gmail.com';							//variable de test test@test.fr
    $pbx_total = '300';								//variable de test 200
    $pbx_nb_produit = '1';					//variable de test 5
    $pbx_prenom_fact = 'Thomas';				//variable de test jean
    $pbx_nom_fact = 'Edison';					//variable de test dupont
    $pbx_adresse1_fact = '1 rue de Paris';				//variable de test 1 rue de Paris
    $pbx_adresse2_fact = '';				//variable de test <vide>
    $pbx_zipcode_fact = '75001';				//variable de test 75001
    $pbx_city_fact = 'Paris';					//variable de test Paris
    $pbx_country_fact = '250';		//variable de test 250 (pour la France)
    $pbx_souhaitauthent = '1';		//variable de test authentification 3DS (1 par d�faut, 2 pour exemption 3DS)
    if ($pbx_total>3000) {$pbx_souhaitauthent = '1';}	//variable de test pour s'assurer que l'exemption 3DS n'est pas propos�e sur une transaction sup�rieur � 30�

    $pbx_billing = "<?xml version=\"1.0\" encoding=\"utf-8\"?><Billing><Address><FirstName>".$pbx_prenom_fact."</FirstName>".
        "<LastName>".$pbx_nom_fact."</LastName><Address1>".$pbx_adresse1_fact."</Address1>".
        "<Address2>".$pbx_adresse2_fact."</Address2><ZipCode>".$pbx_zipcode_fact."</ZipCode>".
        "<City>".$pbx_city_fact."</City><CountryCode>".$pbx_country_fact."</CountryCode>".
        "</Address></Billing>";

    // Recette (paiements de test)  :
    $urletrans ="https://recette-tpeweb.e-transactions.fr/php/";

    $pbx_retour = 'Mt:M;Ref:R;TypeCarte:C;CodeReponse:E;';
    $pbx_ruf1 = "POST";

    echo "pbx_shoppingcart ".htmlentities($pbx_shoppingcart);
    echo "<br><br>";
    echo "pbx_billing ".htmlentities($pbx_billing);
    echo "<br><br>";

    // On cr�e la cha�ne � hacher sans URLencodage
    $msg = "PBX_SITE=".$pbx_site.
        "&PBX_RANG=".$pbx_rang.
        "&PBX_IDENTIFIANT=".$pbx_identifiant.
        "&PBX_TOTAL=".$pbx_total.
        "&PBX_DEVISE=978".
        "&PBX_CMD=".$pbx_cmd.
        "&PBX_PORTEUR=".$pbx_porteur.
        "&PBX_REPONDRE_A=".$pbx_repondre_a.
        "&PBX_RETOUR=".$pbx_retour.
        "&PBX_EFFECTUE=".$pbx_effectue.
        "&PBX_ANNULE=".$pbx_annule.
        "&PBX_REFUSE=".$pbx_refuse.
        "&PBX_HASH=SHA512".
        "&PBX_RUF1=".$pbx_ruf1.
        "&PBX_TIME=".$dateTime.
        "&PBX_SHOPPINGCART=".$pbx_shoppingcart.
        "&PBX_BILLING=".$pbx_billing.
        "&PBX_SOUHAITAUTHENT=".$pbx_souhaitauthent;
    echo "msg ".htmlentities($msg);
    echo "<br><br>";


    // Si la cl� est en ASCII, On la transforme en binaire
    $binKey = pack("H*", $hmackey);
    echo "binKey ".bin2hex($binKey);
    echo "<br><br>";

    $hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));

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
