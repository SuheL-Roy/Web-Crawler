<?php
// $curl = curl_init();
// $requestType = 'GET';
// $url = 'https://yourpetpa.com.au';

// // Set the User-Agent header
// $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0';

// curl_setopt_array($curl, array(
//     CURLOPT_URL => $url,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 30,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => $requestType,
//     CURLOPT_POSTFIELDS => '',
//     CURLOPT_HTTPHEADER => array(
//         'User-Agent: ' . $userAgent,
//     ),
// ));

// $response = curl_exec($curl);



// if ($response === false) {
//     echo 'Curl error: ' . curl_error($curl);
// } else {
  
//     $dom = new DOMDocument;
//     @$dom->loadHTML($response);

//     $xpath = new DOMXPath($dom);
    
//     $desiredContentNodes = $xpath->query('//div[@class="product-block__title"]/a');

//     $extractedContent = [];

//     foreach ($desiredContentNodes as $node) {
//         $extractedContent[] = trim($node->textContent);
//     }

  
//     foreach ($extractedContent as $content) {
//         echo $content . "\n";
//     }
// }

// curl_close($curl);

// $curl = curl_init();
// $requestType = 'GET';
// $url = 'https://yourpetpa.com.au';

// // Set the User-Agent header
// $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0';

// curl_setopt_array($curl, array(
//     CURLOPT_URL => $url,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 30,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => $requestType,
//     CURLOPT_POSTFIELDS => '',
//     CURLOPT_HTTPHEADER => array(
//         'User-Agent: ' . $userAgent,
//     ),
// ));

// $response = curl_exec($curl);

// if ($response === false) {
//     echo 'Curl error: ' . curl_error($curl);
// } else {
//     $dom = new DOMDocument;
//     @$dom->loadHTML($response);

//     $xpath = new DOMXPath($dom);

//     // Extract product titles
//     $desiredTitleNodes = $xpath->query('//div[@class="product-block__title"]/a');
//     $extractedTitles = [];
//     foreach ($desiredTitleNodes as $titleNode) {
//         $extractedTitles[] = trim($titleNode->textContent);
//     }

//     // Extract product prices
//     $desiredPriceNodes = $xpath->query('//div[@class="product-price"]/span[@class="theme_money product-price__reduced"]');
//     $extractedPrices = [];
//     foreach ($desiredPriceNodes as $priceNode) {
//         $extractedPrices[] = trim($priceNode->textContent);
//     }

//     // Display titles and prices
//     for ($i = 0; $i < count($extractedTitles); $i++) {
//         echo "Title: " . $extractedTitles[$i] . " | Price: " . $extractedPrices[$i] . "\n";
//     }
// }

// curl_close($curl);


$curl = curl_init();
$requestType = 'GET';
$url = 'https://yourpetpa.com.au';

// Set the User-Agent header
$userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0';

curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $requestType,
    CURLOPT_POSTFIELDS => '',
    CURLOPT_HTTPHEADER => array(
        'User-Agent: ' . $userAgent,
    ),
));

$response = curl_exec($curl);

if ($response === false) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    $dom = new DOMDocument;
    @$dom->loadHTML($response);

    $xpath = new DOMXPath($dom);

    // Extract product titles
    $desiredTitleNodes = $xpath->query('//div[@class="product-block__title"]/a');
    $extractedTitles = [];
    foreach ($desiredTitleNodes as $titleNode) {
        $extractedTitles[] = trim($titleNode->textContent);
    }

    // Extract product prices
    $desiredPriceNodes = $xpath->query('//div[@class="product-price"]/span[@class="theme_money product-price__reduced"]');
    $extractedPrices = [];
    foreach ($desiredPriceNodes as $priceNode) {
        $extractedPrices[] = trim($priceNode->textContent);
    }

    // Save data to CSV
    $csvData = [];
    for ($i = 0; $i < count($extractedTitles); $i++) {
        $csvData[] = array($extractedTitles[$i], $extractedPrices[$i]);
    }

    // Specify CSV file path
    $csvFilePath = 'products_data.csv';

    // Open the CSV file for writing
    $csvFile = fopen($csvFilePath, 'w');

    // Write header
    fputcsv($csvFile, array('Title', 'Price'));

    // Write data
    foreach ($csvData as $row) {
        fputcsv($csvFile, $row);
    }

    // Close the CSV file
    fclose($csvFile);

    echo 'Data saved to CSV file: ' . $csvFilePath . "\n";
}

curl_close($curl);

?>

