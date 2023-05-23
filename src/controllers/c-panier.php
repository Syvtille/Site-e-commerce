<?php

require_once('src/model.php');

function deleteFromCart($idProduit)
{
    global $idUser;
    try {
        $unUser = get_result("select * from client where id=$idUser");
        $unProduit = get_result("select * from produit where id=$idProduit");
        $panier = get_result("SELECT id FROM panier WHERE id_client = $idUser");
        $idPanier = $panier['id'];
        $inPanier = get_result("SELECT * FROM panier_produit WHERE id_panier = $idPanier AND id_produit = $idProduit");

        if ($unUser && $unProduit && $inPanier) {
            $unPanierProduit = get_result("SELECT pp.id FROM panier_produit pp JOIN panier pa ON pp.id_panier = pa.id WHERE pa.id_client = " . $idUser . " AND pp.id_produit = " . $idProduit);
            if ($unPanierProduit) {
                $valuesBdd = array(
                    "id" => $unPanierProduit['id']
                );
                $rowCountDelete = set_delete("panier_produit", $valuesBdd);
                if ($rowCountDelete) return 1;
                else return 0;
            }
        }else return 0;
    }
    catch(Exception $e){
        return 0;
    }
}

function panier()
{
    global $idUser, $urlSite;

    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        deleteFromCart($_GET['identifiant']);
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