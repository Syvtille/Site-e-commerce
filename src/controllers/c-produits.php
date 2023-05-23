<?php

require_once('src/model.php');

function produits()
{
    global $urlSite;
    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        $unProduits = get_result("SELECT * FROM produit WHERE identifiant = '" . $_GET['identifiant'] . "' AND statut=1");
        if ($unProduits) {
            if (isset($_POST['produit_quantite']) && $_POST['produit_quantite'])
                ajouterAuPanier($unProduits['id'], $_POST['produit_quantite']);

            produitsSimple($unProduits);
        } else {
            Header('Location: ' . $urlSite . 'produits/');
            exit();
        }
    } else {
        $lstProduits = get_results("SELECT * FROM produit WHERE statut=1");
        produitsList($lstProduits);
    }
}

function produitsSimple($unProduits)
{
    $menu['page'] = "produits";


    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/produits/v-produits.php');
    include('view/inc/inc.footer.php');
}

function produitsList($lstProduits)
{
    $menu['page'] = "produits";


    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/produits/v-produits-list.php');
    include('view/inc/inc.footer.php');
}

function ajouterAuPanier($idProduit, $quantite)
{
    global $idUser, $pdo;

    try {
        $unUser = get_result("select * from client where id=$idUser");
        $unProduit = get_result("select * from produit where id=$idProduit and stock >= $quantite");

        if ($unUser && $unProduit) {
            $unPanier = get_result("SELECT * FROM panier WHERE id_client = $idUser");
            if (!$unPanier) {
                $valuesBdd = array(
                    "id_client" => $idUser,
                    "date_creation" => date("Y-m-d H:i:s")
                );
                $idPanier = set_insert("panier", $valuesBdd);
            } else $idPanier = $unPanier['id'];

            $inPanier = get_result("SELECT id, quantite FROM panier_produit WHERE id_panier = $idPanier AND id_produit = $idProduit");
            if ($inPanier) {
                $stmt = $pdo->prepare("UPDATE panier_produit SET quantite = quantite + ? WHERE id = ?");
                $stmt->execute([$quantite, $inPanier['id']]);
                if ($stmt->errorCode() === "00000") return 1;
                else return 0;
            } else {
                $valuesBdd = array(
                    "id_panier" => $idPanier,
                    "id_produit" => $idProduit,
                    "quantite" => $quantite
                );
                $idAjout = set_insert("panier_produit", $valuesBdd);
                if ($idAjout) return 1;
                else return 0;
            }
        } else return 0;
    }
    catch(Exception $e){
        return 0;
    }
}

//function ajouterAuPanier($idProduit, $quantite){
//    global $idUser, $pdo;
//
//    try {
//        $stmt = $pdo->prepare("SELECT * FROM panier WHERE id_client = :id_client");
//        $stmt->bindParam(':id_client', $idUser);
//        $stmt->execute();
//        $unPanier = $stmt->fetch();
//
//        if(!$unPanier) {
//            $valuesBdd = array(
//                "id_client" => $idUser,
//                "date_creation" => date("Y-m-d H:i:s")
//            );
//            $idPanier = set_insert("panier", $valuesBdd);
//        }
//        else $idPanier = $unPanier['id'];
//
//        $stmt = $pdo->prepare("SELECT id, quantite FROM panier_produit WHERE id_panier = :id_panier AND id_produit = :id_produit");
//        $stmt->bindParam(':id_panier', $idPanier);
//        $stmt->bindParam(':id_produit', $idProduit);
//        $stmt->execute();
//        $inPanier = $stmt->fetch();
//
//        if($inPanier){
//            $stmt = $pdo->prepare("UPDATE panier_produit SET quantite = quantite + :quantite WHERE id = :id");
//            $stmt->bindParam(':quantite', $quantite);
//            $stmt->bindParam(':id', $inPanier['id']);
//            $stmt->execute();
//        }
//        else{
//            $valuesBdd = array(
//                "id_panier" => $idPanier,
//                "id_produit" => $idProduit,
//                "quantite" => $quantite
//            );
//            set_insert("panier_produit", $valuesBdd);
//        }
//    } catch (PDOException $e) {
//        error_log("Erreur lors de l'ajout au panier : " . $e->getMessage());
//        //peut-être rediriger vers page erreur
//    }
