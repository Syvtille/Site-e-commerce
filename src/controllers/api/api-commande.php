<?php

require_once('src/model.php');
require_once('src/controllers/api/auth-api.php');

function apiCommande(){

    authApi();

    if(isset($_POST['idCommande'])){
        echo json_encode(getCommande($_POST['idCommande']));
    }
    else{
        echo json_encode(getCommande());
    }

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
