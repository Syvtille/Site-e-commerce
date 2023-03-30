<?php

require_once('src/model.php');

function produits(){
    global $urlSite;
    if(isset($_GET['identifiant']) && $_GET['identifiant']){
        $unProduits = get_result("SELECT * FROM produit WHERE identifiant = '".$_GET['identifiant']."' AND statut=1");
        if($unProduits){
            if (isset($_POST['produit_quantite']) && $_POST['produit_quantite'])
                ajouterAuPanier($unProduits['id'], $_POST['produit_quantite']);

            produitsSimple($unProduits);
        }
        else{
            Header('Location: ' . $urlSite . 'produits/');
            exit();
        }
    }
    else{
        $lstProduits = get_results("SELECT * FROM produit WHERE statut=1");
        produitsList($lstProduits);
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

function produitsList($lstProduits)
{
    $menu['page'] = "produits";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/produits/v-produits-list.php');
    include('view/inc/inc.footer.php');
}

function ajouterAuPanier($idProduit, $quantite){
    global $idUser, $pdo;

    $unPanier=get_result("SELECT * FROM panier WHERE id_client = $idUser");
    if(!$unPanier) {
        $valuesBdd = array(
            "id_client" => $idUser,
            "date_creation" => date("Y-m-d H:i:s")
        );
        $idPanier = set_insert("panier", $valuesBdd);
    }
    else $idPanier = $unPanier['id'];

    $inPanier = get_result("SELECT id, quantite FROM panier_produit WHERE id_panier = $idPanier AND id_produit = $idProduit");
    if($inPanier){
//        $pdo->query("UPDATE panier_produit SET quantite = quantite + $quantite WHERE id = '" . $inPanier['id'] . "'");
        $stmt = $pdo->prepare("UPDATE panier_produit SET quantite = quantite + ? WHERE id = ?");
        $stmt->execute([$quantite, $inPanier['id']]);
    }
    else{
        $valuesBdd = array(
            "id_panier" => $idPanier,
            "id_produit" => $idProduit,
            "quantite" => $quantite
        );
        set_insert("panier_produit", $valuesBdd);
    }
}