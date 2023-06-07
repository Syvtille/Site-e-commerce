<?php
require_once('src/model.php');
function commander()
{
    global $idUser;
    if (isset($_POST['fac_nom']) && $_POST['fac_nom']) {
        $unPanier = get_result("SELECT * FROM panier WHERE id_client = $idUser");
        $idPanier = $unPanier['id'];
        saveCommande($idUser, $idPanier);
    }
    printCommande();
}

function printCommande()
{
    $menu['page'] = "commander";
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/commander/v-commander.php');
    require('view/inc/inc.footer.php');
}

function saveCommande($idUser, $idPanier)
{
    global $pdo;
    $valuesBdd = array(
        "id_client" => $idUser,
        "nom" => $_POST['fac_nom'],
        "prenom" => $_POST['fac_prenom'],
        "email" => $_POST['fac_email'],
        "telephone" => $_POST['fac_tel'],
        "adresse" => $_POST['fac_adresse'],
        "complement" => $_POST['fac_complement'],
        "code_postal" => $_POST['fac_code_postal'],
        "ville" => $_POST['fac_ville'],
        "nom_livraison" => $_POST['liv_nom'],
        "prenom_livraison" => $_POST['liv_prenom'],
        "email_livraison" => $_POST['liv_email'],
        "telephone_livraison" => $_POST['liv_tel'],
        "adresse_livraison" => $_POST['liv_adresse'],
        "complement_livraison" => $_POST['liv_complement'],
        "code_postal_livraison" => $_POST['liv_code_postal'],
        "ville_livraison" => $_POST['liv_ville'],
        "date_creation" => date('Y-m-d H:i:s'),
        "statut" => "1",
    );
    set_insert("commande", $valuesBdd);
    $idCommande = $pdo->lastInsertId();
    $lstPdtPanier = get_results("SELECT * FROM panier_produit, produit
WHERE id_produit = produit.id AND id_panier=" . $idPanier);
    foreach ($lstPdtPanier as $unProduit) {
        $valuesBdd = array(
            "id_commande" => $idCommande,
            "id_produit" => $unProduit['id_produit'],
            "quantite" => $unProduit['quantite'],
            "prix_unitaire" => $unProduit['prix'],
            "id_tva" => $unProduit['id_tva'],
        );
        set_insert("commande_produit", $valuesBdd);
    }
    $pdo->query("DELETE FROM panier WHERE id = $idPanier");
    $pdo->query("DELETE FROM panier_produit WHERE id_panier = $idPanier");
    header('Location: https://s4-gp98.kevinpecro.info/paiement/');
    exit;
}