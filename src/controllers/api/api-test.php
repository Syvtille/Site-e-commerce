<?php

require_once('src/model.php');
require_once('src/controllers/api/auth-api.php');

function apiTest(){

    authApi();

    if(isset($_POST['idTest'])){
        $idTest = $_POST['idTest'];
        echo json_encode(getApiTest($idTest));
    }
    else{
        echo json_encode(getApiTests());
    }

}

function getApiTests()
{
    return get_results("SELECT * FROM test_api");
}

function getApiTest($idTest)
{
    return get_result("SELECT * FROM test_api WHERE id = $idTest");
}
