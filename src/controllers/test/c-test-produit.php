<?php

require_once('src/model.php');

function testProduit()
{
    $lstProduits = get_results("SELECT * FROM produit");

    $idMax = max(array_column($lstProduits, 'id'));

    $lstProduits[] = array("id" => $idMax+1, "nom" => "Produit test 1");
    $lstProduits[] = array("id" => $idMax+2, "nom" => "Produit test 2");

    $lstTests = array();

    foreach ($lstProduits as $unProduit) {
        $quantite = rand(0, 10);
        $test = ajouterAuPanier($unProduit['id]'], $quantite);
        $lstTests[] = array(
            "idProduit" => $unProduit['id'],
            "nom" => $unProduit['nom'],
            "quantite" => $quantite,
            "result" => $test
        );
    }

    require('view/test/v-test-produit.php');
}
