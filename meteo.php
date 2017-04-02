<?php

function get_weather($city)
{
    $url_api = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=fddbf4757db1deffe6bd2c9f0adf1e62&units=metric';
    
    $request = curl_init($url_api);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($request, CURLOPT_COOKIESESSION, true);

    $result = curl_exec($request);
    $result = json_decode($result, true);

    curl_close($request);

    $meteo_datas = [
        "ville" => $result['name'],
        "temp" => round($result['main']['temp']),
        "description" => $result['weather'][0]['main'],
        "icon" => $result['weather'][0]['icon'],
        "wind" => $result['wind']['speed'],
    ];

    return $meteo_datas;
}