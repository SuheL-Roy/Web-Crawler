<?php
include './html.php';

//$html = file_get_html('https://yourpetpa.com.au');

// $img = $html->find('img',0)->src;

$context = stream_context_create([
    'http' => [
        'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0',
    ],
]);

$html = file_get_html('https://yourpetpa.com.au', false, $context);

echo $html;