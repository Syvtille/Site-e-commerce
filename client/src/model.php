<?php

function appelApi($what = null, $params = [])
{
    global $urlRequete;

    $urlRequete .= $what . '/';

    $data = array(
        'token' => 'WTIyM3Nv',
    );
    if ($params) {
        foreach ($params as $key => $value) {
            $data[$key] = $value;
        }
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $urlRequete);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

//    if ($response === false) {
//        echo 'Erreur Curl : ' . curl_error($curl);
//    } else {
//        echo 'Réponse du serveur : ' . $response;
//    }

    curl_close($curl);

    return $response;
}