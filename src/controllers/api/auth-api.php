<?php

require_once('src/model.php');

function authApi(){

    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        http_response_code(405);
        die('Méthode non autorisée');
    }

    //token = Y123so into base64 = WTIyM3Nv
    if(!isset($_POST['token']) || $_POST['token'] !== 'WTIyM3Nv'){
        http_response_code(401);
        die('Non autorisé');
    }

}
