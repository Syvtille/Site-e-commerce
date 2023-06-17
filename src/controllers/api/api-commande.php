<?php

require_once('src/model.php');
require_once('src/controllers/api/auth-api.php');

function apiCommande(){

    authApi();

    if(isset($_POST['idCommande'])){
        $data = getCommande($_POST['idCommande']);
    }
    else{
        $data = getCommande();
    }
    $data = addTotal($data);
    $data = addProduits($data);
    echo json_encode($data);
}

function addTotal($commandes)
{
    foreach($commandes as &$commande): // référence (&) pour modifier l'élément dans le tableau
        $totalCommande = get_results("SELECT * FROM commande_produit WHERE id_commande = " . $commande['id']);

        $total = 0;
        foreach ($totalCommande as $item):
            $total += $item['quantite'] * $item['prix_unitaire'];
        endforeach;

        $commande['total'] = $total;
    endforeach;

    return $commandes;
}

function addProduits($commandes)
{
    foreach($commandes as &$commande): // référence (&) pour modifier l'élément dans le tableau
        $produits = get_results("SELECT cp.id_produit, cp.quantite, p.nom, p.image
                                           FROM commande_produit cp
                                             INNER JOIN produit p ON cp.id_produit = p.id
                                        WHERE cp.id_commande = ".$commande['id']);

        $commande['produits'] = $produits;
    endforeach;

    return $commandes;
}

function getCommande($idCommande = null)
{
    if($idCommande){
        return get_results("SELECT * FROM commande WHERE id = $idCommande");
    }
    else{
        return get_results("SELECT * FROM commande");
    }
}
