<?php

require_once('src/model.php');

function paiementBackoffice()
{

    set_insert('paiement', [
        'id_unique' => $_POST['Ref'],
        'montant' => $_POST['Mt'],
        'type_carte' => $_POST['TypeCarte'],
        'code_reponse' => $_POST['CodeReponse'],
        'date_paiement' => date('Y-m-d H:i:s'),
    ]);

    //récupération du numéro de commande
    $numeroCommande = 0;
    preg_match('/\d+$/', $_POST['Ref'], $matches);
    if (count($matches) > 0) {
        $numeroCommande = intval($matches[0]);
    }

    execute_query("UPDATE commande SET statut = 1 WHERE id = " . $numeroCommande);
    execute_query("UPDATE commande SET date_visibilite = NOW() WHERE id = " . $numeroCommande);

}
