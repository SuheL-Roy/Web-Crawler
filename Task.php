<?php

$curl = curl_init();
$requestType = 'GET'; // GET POST DELETE etc.
$url = 'https://www.imdb.com/chart/boxoffice/';
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_FOLLOWLOCATION => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $requestType,
    CURLOPT_POSTFIELDS => '',
    CURLOPT_HTTPHEADER => [],
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;
// libxml_use_internal_errors(true);
// $dom = new DOMDocument();
// $dom->loadHTML($response);
// $xpath = new DOMXPath($dom);


// $titleNode = $xpath->query('//div[@class="ipc-title"]/a/h3[@class="ipc-title__text"]')->item(0);


// $title = $titleNode ? $titleNode->nodeValue : '';

// echo "Title: " . $title . "\n";
