<?php

require_once('../model.php');

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nouvelle_valeur'], $_POST['id_produit'])) {
        $nouvelleValeur = $_POST['nouvelle_valeur'];
        $idProduit = $_POST['id_produit'];
        $unPanier = get_result("SELECT * FROM panier WHERE id_client = 1");
        $idPanier = $unPanier['id'];

        execute_query("UPDATE panier_produit SET quantite = " . $nouvelleValeur . " WHERE id_produit = " . $idProduit . " AND id_panier = " . $idPanier);
    }
}

