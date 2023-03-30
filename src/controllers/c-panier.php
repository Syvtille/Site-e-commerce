<?php

require_once('src/model.php');

function panier() {
    global $idUser;

    $panierProduits = get_results("SELECT p.nom, pp.quantite, p.prix FROM panier_produit pp JOIN panier pa ON pp.id_panier = pa.id JOIN produit p ON pp.id_produit = p.id WHERE pa.id_client = $idUser");

    $menu['page'] = "panier";

    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/panier/v-panier.php');
    include('view/inc/inc.footer.php');
}