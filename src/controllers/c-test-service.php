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

        // Retourner l'objet cURL au lieu de la réponse
        return $ch;
    }

    foreach ($urls as $url) {
        // Cas où on utilise la méthode GET
        $chGet = makeRequest($url, 'GET');
        $httpCodeGet = curl_getinfo($chGet, CURLINFO_HTTP_CODE);
        echo "GET - $url : $httpCodeGet\n";

        // Cas où on utilise la méthode POST avec un mauvais token
        $chPostBadToken = makeRequest($url, 'POST', 'mauvais_token');
        $httpCodePostBadToken = curl_getinfo($chPostBadToken, CURLINFO_HTTP_CODE);
        echo "POST (mauvais token) - $url : $httpCodePostBadToken\n";

        // Cas où on utilise la méthode POST avec le bon token
        $chPostGoodToken = makeRequest($url, 'POST', 'WTIyM3Nv');
        $httpCodePostGoodToken = curl_getinfo($chPostGoodToken, CURLINFO_HTTP_CODE);
        echo "POST (bon token) - $url : $httpCodePostGoodToken\n";

        // Fermer les objets cURL
        curl_close($chGet);
        curl_close($chPostBadToken);
        curl_close($chPostGoodToken);

        echo "\n";
    }

}
