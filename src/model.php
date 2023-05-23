<?php
$port = 3306;
$server = "localhost";
$base = "s4-gp98";
$user = "s4-gp98";
$mdp = "^HshdDu*G5vdw1p1";

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
    return $pdo->lastInsertId();
}
//function set_insert($table, $data)
//{
//    global $pdo;
//
//    try {
//        $keys = array_keys($data);
//        $fields = implode(",", $keys);
//        $placeholders = ":".implode(",:", $keys);
//
//        $stmt = $pdo->prepare("INSERT INTO $table ($fields) VALUES ($placeholders)");
//
//        foreach ($data as $key => $value) {
//            $stmt->bindValue(':'.$key, $value);
//        }
//        $stmt->execute();
//        return $pdo->lastInsertId();
//    } catch (PDOException $e) {
//        error_log("Erreur lors de l'insertion dans la base de données : " . $e->getMessage());
//        //peut-être rediriger vers page erreur
//        return false;
//    }
//}


function set_delete($table, $date){
    global $pdo;

    $requete = "";

    foreach ($date as $key => $value) {
        if ($key && $value) {
            if (!!$requete) {
                $requete .= " AND ";
            }
            $requete .= $key . " = '" . $value . "'";
        }
    }
    $requete = "DELETE FROM $table WHERE $requete";
    $stmt = $pdo->query($requete);
}

?>