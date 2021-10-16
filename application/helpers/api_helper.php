<?php
define('BASE_URL_API', 'https://api.rajaongkir.com/starter/');
define('KEY_API', '9f7ffcbf26b5b8601e87b190753a9146');

function api_logistic($log, $awb) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://yapptubs.com/x/GTrack/GTrack/?logistic=$log&awb=$awb",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function api($method, $endpoint, $data = [])
{
    $curl = curl_init();

    if ($method == 'GET') {
        curl_setopt_array($curl, array(
            CURLOPT_URL => BASE_URL_API . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
                "key: " . KEY_API
            ),
        ));
    } else {
        //city_id = 456 // kota tangerang
        if ($endpoint == 'cost') {
            curl_setopt_array($curl, array(
                CURLOPT_URL => BASE_URL_API . $endpoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "origin=456&destination=" . $data['origin'] . "&weight=" . $data['origin'] . "&courier=" . $data['courier'],
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: " . KEY_API
                ),
            ));
        } else {
            curl_setopt_array($curl, array(
                CURLOPT_URL => BASE_URL_API . $endpoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: " . KEY_API
                ),
            ));
        }
    }

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
