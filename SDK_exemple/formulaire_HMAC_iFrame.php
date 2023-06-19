<?php

// --------------- VARIABLES A MODIFIER ---------------


// Ennonciation de variables
$pbx_site = '3277512';
$pbx_identifiant = '38023694';
$pbx_rang = '001';
$pbx_cmd = '22gp98-test'.uniqid();
$pbx_porteur = 'escande.florian.chatco@gmail.com';							//variable de test test@test.fr
$pbx_total = '300';								//variable de test 200
$pbx_nb_produit = '1';					//variable de test 5
$pbx_prenom_fact = 'Thomas';				//variable de test jean
$pbx_nom_fact = 'Edison';					//variable de test dupont
$pbx_adresse1_fact = '1 rue de Paris';				//variable de test 1 rue de Paris
$pbx_adresse2_fact = '';				//variable de test <vide>
$pbx_zipcode_fact = '75001';				//variable de test 75001
$pbx_city_fact = 'Paris';					//variable de test Paris
//$pbx_country_fact = 'code pays iso-3166-1 num�rique de l adresse de facturation';	//variable de test 250 (pour la France)
$pbx_country_fact = '250';		//variable de test 250 (pour la France)
$pbx_souhaitauthent = '1';		//variable de test authentification 3DS (1 par d�faut, 2 pour exemption 3DS)
if ($pbx_total>3000) {$pbx_souhaitauthent = '1';}	//variable de test pour s'assurer que l'exemption 3DS n'est pas propos�e sur une transaction sup�rieur � 30�

// Suppression des points ou virgules dans le montant						
	$pbx_total = str_replace(",", "", $pbx_total);
	$pbx_total = str_replace(".", "", $pbx_total);

// Param�trage des urls de redirection navigateur client apr�s paiement
$pbx_effectue = 'https://www.s4-gp98.kevinpecro.info/accepte';
$pbx_annule = 'https://www.s4-gp98.kevinpecro.info/annule';
$pbx_refuse = 'https://www.s4-gp98.kevinpecro.info/refuse';
// Param�trage de l'url de retour back office site
$pbx_repondre_a = 'https://www.s4-gp98.kevinpecro.info/back-office/';

// Param�trage du retour back office site
//$pbx_retour = 'Mt:M;Ref:R;Auto:A;Erreur:E';
//PBX_RETOUR = Mt:M;Ref:R;Auto:A;Appel:T;Abo:B;ChoixPaiement:P;ChoixCarte:C;Erreur:E;
//$pbx_retour = 'Mt:M;Ref:R;Auto:A;Appel:T;Abo:B;Reponse:E;Trans:S;Pays:Y;Signature:K;';
$pbx_retour = 'Mt:M;Ref:R;TypeCarte:C;CodeReponse:E;';

// Connection � la base de donn�es
// mysql_connect...
// On r�cup�re la cl� secr�te HMAC (stock�e dans une base de donn�es par exemple) et que l�on renseigne dans la variable $hmackey;
// $hmackey = '4642EDBBDFF9790734E673A9974FC9DD4EF40AA2929925C40B3A95170FF5A578E7D2579D6074E28A78BD07D633C0E72A378AD83D4428B0F3741102B69AD1DBB0';
$hmackey = 'BA17D491C851E427024E9F3017CE92A9EDC0D79B4E4370FD05B9956F52844F832218444330AA8C9E4D4123422528B68C166783F75888919DC56C95524A2D6C56';


// --------------- TESTS DE DISPONIBILITE DES SERVEURS ---------------

$serveurs = array('tpeweb.e-transactions.fr', //serveur primaire
'tpeweb1.e-transactions.fr'); //serveur secondaire
//$serveurOK = "recette-tpeweb.e-transactions.fr";
$serveurOK = "";
//phpinfo();
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


// --------------- TRAITEMENT DES VARIABLES ---------------

// On r�cup�re la date au format ISO-8601
$dateTime = date("c");

$pbx_shoppingcart = "<?xml version=\"1.0\" encoding=\"utf-8\"?><shoppingcart><total><totalQuantity>".$pbx_nb_produit."</totalQuantity></total></shoppingcart>";

$pbx_billing = "<?xml version=\"1.0\" encoding=\"utf-8\"?><Billing><Address><FirstName>".$pbx_prenom_fact."</FirstName>".
				"<LastName>".$pbx_nom_fact."</LastName><Address1>".$pbx_adresse1_fact."</Address1>".
				"<Address2>".$pbx_adresse2_fact."</Address2><ZipCode>".$pbx_zipcode_fact."</ZipCode>".
				"<City>".$pbx_city_fact."</City><CountryCode>".$pbx_country_fact."</CountryCode>".
				"</Address></Billing>";

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
"&PBX_RUF1=POST".
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

// On calcule l�empreinte (� renseigner dans le param�tre PBX_HMAC) gr�ce � la fonction hash_hmac et //
// la cl� binaire
// On envoi via la variable PBX_HASH l'algorithme de hachage qui a �t� utilis� (SHA512 dans ce cas)
// Pour afficher la liste des algorithmes disponibles sur votre environnement, d�commentez la ligne //
// suivante
// print_r(hash_algos());
$hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));
echo "hmac ".$hmac;
echo "<br><br>";


// La cha�ne sera envoy�e en majuscule, d'o� l'utilisation de strtoupper()
// On cr�e le formulaire � envoyer
// ATTENTION : l'ordre des champs est extr�mement important, il doit
// correspondre exactement � l'ordre des champs dans la cha�ne hach�e
?>



<!------------------ ENVOI DES INFORMATIONS A e-Transactions (Formulaire) ------------------>
<form method="POST" action="<?php echo $serveurOK; ?>" target="iframePayment">
<input type="hidden" name="PBX_SITE" value="<?php echo $pbx_site; ?>">
<input type="hidden" name="PBX_RANG" value="<?php echo $pbx_rang; ?>">
<input type="hidden" name="PBX_IDENTIFIANT" value="<?php echo $pbx_identifiant; ?>">
<input type="hidden" name="PBX_TOTAL" value="<?php echo $pbx_total; ?>">
<input type="hidden" name="PBX_DEVISE" value="978">
<input type="hidden" name="PBX_CMD" value="<?php echo $pbx_cmd; ?>">
<input type="hidden" name="PBX_PORTEUR" value="<?php echo $pbx_porteur; ?>">
<input type="hidden" name="PBX_REPONDRE_A" value="<?php echo $pbx_repondre_a; ?>">
<input type="hidden" name="PBX_RETOUR" value="<?php echo $pbx_retour; ?>">
<input type="hidden" name="PBX_EFFECTUE" value="<?php echo $pbx_effectue; ?>">
<input type="hidden" name="PBX_ANNULE" value="<?php echo $pbx_annule; ?>">
<input type="hidden" name="PBX_REFUSE" value="<?php echo $pbx_refuse; ?>">
<input type="hidden" name="PBX_HASH" value="SHA512">
<input type="hidden" name="PBX_RUF1" value="POST">
<input type="hidden" name="PBX_TIME" value="<?php echo $dateTime; ?>">
<input type="hidden" name="PBX_SHOPPINGCART" value="<?php echo htmlspecialchars($pbx_shoppingcart); ?>">
<input type="hidden" name="PBX_BILLING" value="<?php echo htmlspecialchars($pbx_billing); ?>">
<input type="hidden" name="PBX_SOUHAITAUTHENT" value="<?php echo $pbx_souhaitauthent; ?>">
<input type="hidden" name="PBX_HMAC" value="<?php echo $hmac; ?>">
<input type="submit" value="Envoyer dans l'iFrame">
</form>
<br/><br/>
IFrame payment<br />
<iframe name="iframePayment" title="iframe payment page" width="450" height="500" style="border: 1px solid">
</iFrame>


