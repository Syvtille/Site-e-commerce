<?php

require_once('src/model.php');

function paiementBackoffice()
{
    set_insert('paiement', [
        'id_unique' => $_POST['Ref'],
        'montant' => $_POST['Mt'],
        'type_carte' => $_POST['TypeCarte'],
        'code_reponse' => $_POST['CodeReponse'],
        'date_paiement' => date('Y-m-d H:i:s')
    ]);

//    try {
//        ob_start();
//        var_dump($_POST);
//        $content = ob_get_clean();
//        ob_end_clean();
//    } catch (Exception $e) {
//        $content = $e->getMessage();
//    }
//    error_log($content);

    //modifier $_POST['Mt']; voir la doc
    //exemple : PBX_RETOUR=Mt:M;Ref:R;Auto:A;Appel:T;Abo:B;Reponse:E;Trans:S;Pays:Y;Signature:K;

    //insert dans la base
//    $valuesBdd = array(
//        "id_client" => $_POST['id_client'],
//        "nom" => $_POST['fac_nom'],
//        "prenom" => $_POST['fac_prenom'],
//        "email" => $_POST['fac_email'],
//        "telephone" => $_POST['fac_tel'],
//        "adresse" => $_POST['fac_adresse'],
//        "complement" => $_POST['fac_complement'],
//        "code_postal" => $_POST['fac_code_postal'],
//        "ville" => $_POST['fac_ville'],
//        "nom_livraison" => $_POST['liv_nom'],
//        "prenom_livraison" => $_POST['liv_prenom'],
//        "email_livraison" => $_POST['liv_email'],
//        "telephone_livraison" => $_POST['liv_tel'],
//        "adresse_livraison" => $_POST['liv_adresse'],
//        "complement_livraison" => $_POST['liv_complement'],
//        "code_postal_livraison" => $_POST['liv_code_postal'],
//        "ville_livraison" => $_POST['liv_ville'],
//        "date_creation" => date('Y-m-d H:i:s'),
//        "statut" => "1",
//    );
//    set_insert("commande", $valuesBdd);
//    $idCommande = $pdo->lastInsertId();
//    $lstPdtPanier = get_results("SELECT * FROM panier_produit, produit WHERE id_produit = produit.id AND id_panier=" . $idPanier);
//    foreach ($lstPdtPanier as $unProduit) {
//        $valuesBdd = array(
//            "id_commande" => $idCommande,
//            "id_produit" => $unProduit['id_produit'],
//            "quantite" => $unProduit['quantite'],
//            "prix_unitaire" => $unProduit['prix'],
//            "id_tva" => $unProduit['id_tva'],
//        );
//        set_insert("commande_produit", $valuesBdd);
//    }
}
