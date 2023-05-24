<?php

require_once('src/model.php');
require_once('src/controllers/api/auth-api.php');

function apiPaiement(){

    authApi();

    if(isset($_POST['idPaiement'])){
        echo json_encode(getPaiement($_POST['idPaiement']));
    }
    else{
        echo json_encode(getPaiement());
    }

}

function getPaiement($idPaiement = null)
{
    if($idPaiement){
        return get_result("SELECT * FROM paiement WHERE id_paiement = $idPaiement");
    }
    else{
        return get_results("SELECT * FROM paiement");
    }
}
