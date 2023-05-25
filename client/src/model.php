<?php

function appelApi($what = null, $params = [])
{
    global $urlRequete;
    $token = 'WTIyM3Nv';

    $urlRequete .= $what . '/';

    $data = array(
        'token' => $token
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
    curl_close($curl);

    return $response;
}