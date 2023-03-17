<?php

require('src/model.php');

function produits(){
    if(isset($_GET['identifiant']) && $_GET['identifiant']){
        $unProduits = get_result("SELECT * FROM produits WHERE identifiant = '".$_GET['identifiant']."' AND statut=1");
        if($unProduits){
            produitsSimple($unProduits);
        }
        else{
            Header('Location: https://s4-gp98.kevinpecro.info/produits/');
            exit();
        }
    }
    else{
        $lstproduits = get_results("SELECT * FROM produits WHERE statut=1");
        produitsList($lstproduits);
    }
}

function produitsSimple($unProduits)
{
    $menu['page'] = "produits";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/produits/v-produits.php');
    include('view/inc/inc.footer.php');
}

function produitsList($lstproduits)
{
    $menu['page'] = "produits";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/produits/v-produits-list.php');
    include('view/inc/inc.footer.php');
}
