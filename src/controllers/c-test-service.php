<?php

require_once('src/model.php');

function testService()
{

    $urls = [
        'https://s4-gp98.kevinpecro.info/api/commande/',
        'https://s4-gp98.kevinpecro.info/api/liste/',
        'https://s4-gp98.kevinpecro.info/api/paiement/'
    ];

    function makeRequest($url, $method, $token = null)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if ($method === 'POST' && $token !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['token' => $token]));
        }

        $response = curl_exec($ch);

        // Retourner à la fois l'objet cURL et la réponse JSON
        return [$ch, $response];
    }

    foreach ($urls as $url) {
        // Cas où on utilise la méthode GET
        [$chGet, $responseGet] = makeRequest($url, 'GET');
        $httpCodeGet = curl_getinfo($chGet, CURLINFO_HTTP_CODE);
        echo "GET - $url : $httpCodeGet\n";
        saveApiTestResult($url, 'GET', $httpCodeGet, $responseGet);

        // Cas où on utilise la méthode POST avec un mauvais token
        [$chPostBadToken, $responsePostBadToken] = makeRequest($url, 'POST', 'mauvais_token');
        $httpCodePostBadToken = curl_getinfo($chPostBadToken, CURLINFO_HTTP_CODE);
        echo "POST (mauvais token) - $url : $httpCodePostBadToken\n";
        saveApiTestResult($url, 'POST', $httpCodePostBadToken, $responsePostBadToken);

        // Cas où on utilise la méthode POST avec le bon token
        [$chPostGoodToken, $responsePostGoodToken] = makeRequest($url, 'POST', 'WTIyM3Nv');
        $httpCodePostGoodToken = curl_getinfo($chPostGoodToken, CURLINFO_HTTP_CODE);
        echo "POST (bon token) - $url : $httpCodePostGoodToken\n";
        saveApiTestResult($url, 'POST', $httpCodePostGoodToken, $responsePostGoodToken);

        // Fermer les objets cURL
        curl_close($chGet);
        curl_close($chPostBadToken);
        curl_close($chPostGoodToken);

        echo "\n";
    }
}

function saveApiTestResult($url, $method, $httpCode, $response)
{
    $dateHeure = date('Y-m-d H:i:s');
    $data = [
        'url' => $url,
        'date_heure' => $dateHeure,
        'code_erreur' => $httpCode,
        'methode' => $method,
        'json' => $response
    ];

    set_insert('test_api', $data);
}
