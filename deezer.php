<?php

function get_playlist($keyword)
{
    $url_api = 'http://api.deezer.com/search?q=track:"' . $keyword . '""&limit=5';

    $request = curl_init($url_api);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($request, CURLOPT_COOKIESESSION, true);

    $result = curl_exec($request);
    $playlist = json_decode($result, true);

    curl_close($request);

    return $playlist;
}
