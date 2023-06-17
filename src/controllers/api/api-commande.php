<?php

require_once('src/model.php');
require_once('src/controllers/api/auth-api.php');

function apiCommande(){

    authApi();

    if(isset($_POST['idCommande'])){
        $data = getCommande($_POST['idCommande']);
        $data = addTotal($data);
        echo json_encode($data);
    }
    else{
        $data = getCommande();
        $data = addTotal($data);
        echo json_encode($data);
    }

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

function getCommande($idCommande = null)
{
    if($idCommande){
        return get_result("SELECT * FROM commande WHERE id = $idCommande");
    }
    else{
        return get_results("SELECT * FROM commande");
    }
}
