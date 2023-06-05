<?php

require_once('src/model.php');

function apiTest(){

    $idTest = (isset($_GET['identifiant']) && $_GET['identifiant']) ? $_GET['identifiant'] : null;

    $menu['page'] = "api-test";

    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');

    if (!$idTest) {
        $reponse = appelApi('api-test');
        $tests = json_decode($reponse, true);
        include('view/api-test/v-api-test.php');
    }
    else {
        $reponse = appelApi('api-test', ['idTest' => $idTest]);
        $test = json_decode($reponse, true);
        include('view/api-test/v-api-test-detail.php');
    }

    include('view/inc/inc.footer.php');
}
