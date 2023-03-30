<?php

require_once('src/model.php');

function panier()
{
    global $idUser, $urlSite;

    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        $unPanierProduit = get_result("SELECT pp.id FROM panier_produit pp JOIN panier pa ON pp.id_panier = pa.id WHERE pa.id_client = " . $idUser . " AND pp.id_produit = " . $_GET['identifiant']);
        if ($unPanierProduit) {
            $valuesBdd = array(
                "id" => $unPanierProduit['id']
            );
            set_delete("panier_produit", $valuesBdd);
        }

        Header('Location: ' . $urlSite . 'panier/');
    }
    else {
        $panierProduits = get_results("SELECT p.nom, pp.quantite, p.prix, pp.id_produit FROM panier_produit pp JOIN panier pa ON pp.id_panier = pa.id JOIN produit p ON pp.id_produit = p.id WHERE pa.id_client = $idUser");

        $menu['page'] = "panier";

        include('view/inc/inc.head.php');
        include('view/inc/inc.header.php');
        include('view/panier/v-panier.php');
        include('view/inc/inc.footer.php');
    }
}