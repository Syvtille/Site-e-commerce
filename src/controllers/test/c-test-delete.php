<?php

require_once('src/model.php');

function testDelete(){
    $lstProduits = get_results("SELECT * FROM produit");

    $idMax = max(array_column($lstProduits, 'id'));

    $lstProduits[] = array("id" => $idMax+1, "nom" => "Produit test 1");
    $lstProduits[] = array("id" => $idMax+2, "nom" => "Produit test 2");

    $lstTests = array();

    foreach ($lstProduits as $unProduit) {
        $test = deleteFromCart($unProduit['id']);
        $lstTests[] = array(
            "idProduit" => $unProduit['id'],
            "nom" => $unProduit['nom'],
            "result" => $test
        );
    }

    require('view/test/v-test-delete.php');
}
