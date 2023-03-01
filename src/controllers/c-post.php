<?php

require('src/model.php');

function post(){
    if(isset($_GET['identifiant']) && $_GET['identifiant']){
        $port = 3306;
        $server = "localhost";
        $base = "s4-demo3";
        $user = "s4-demo3";
        $mdp = "30g3h@iNh?rhqTJx";

        try {
            $pdo = new PDO ("mysql:host=$server;port=$port;dbname=$base;charset=utf8", $user, $mdp);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        function get_result($requete)
        {
            global $pdo;
            $requete = $pdo->query($requete);
            return $requete->fetch(PDO::FETCH_ASSOC);
        }

        function get_results($requete)
        {
            global $pdo;
            $requete = $pdo->query($requete);
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        }

        function set_insert($table, $data)
        {
            global $pdo;

            $requete = "";
            $values = "";

            foreach ($data as $key => $value) {
                if ($key && $value) {
                    if (!!$requete) {
                        $requete .= ", ";
                        $values .= "', '";
                    }
                    $requete .= $key;
                    $values .= $value;
                }
            }
            $requete = "INSERT INTO $table ($requete) VALUES ('$values')";
            $stmt = $pdo->query($requete);
        }
    }
    else{

    }
}

function postSimple()
{
    $menu['page'] = "post";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/inc/inc.footer.php');
    include('view/post/v-post.php');
}

function postList()
{
    $menu['page'] = "post";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/inc/inc.footer.php');
    include('view/post/v-post-list.php');
}