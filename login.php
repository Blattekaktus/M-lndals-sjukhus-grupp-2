<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$cookiepath = "/tmp/cookies.txt";
$tmeout = 3600; // (3600=1hr)

// här sätter ni er domän
$baseurl = 'http://193.93.250.83/';

try {
    $ch = curl_init($baseurl . 'api/method/login');
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}

curl_setopt($ch, CURLOPT_POST, true);

// Här sätter ni era login-data
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"usr":"a22jakwe@student.his.se", "pwd":"Högskolan23"}');

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept:
application/json'
)
);
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiepath);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiepath);
curl_setopt($ch, CURLOPT_TIMEOUT, $tmeout);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo "HTTP status code: " . $httpCode . "<br>";
$response = json_decode($response, true);
echo "Raw response:<br>";
echo "<pre>" . $response . "</pre>";



$error_no = curl_errno($ch);
$error = curl_error($ch);
curl_close($ch);


if (!empty($error_no)) {
    echo "<div style='background-color:red'>";
    echo '$error_no<br>';
    var_dump($error_no);
    echo "<hr>";

    echo '$error<br>';
    var_dump($error);
    echo "<hr>";
    echo "</div>";

}

echo "<div style='background-color:lightgray; border:1px solid black'>";
echo '$response<br><pre>';
echo print_r($response) . "</pre><br>";
echo "</div>";


if (isset($response['success']) && $response['success'] == true) {
    try {
        $ch = curl_init($baseurl . 'api/method/getUserData');
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }

    curl_setopt($ch, CURLOPT_HTTPGET, true); // Använd GET om det är hur API:et fungerar för att hämta data
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json'
    ));
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiepath); // Viktigt för att skicka med sessionens cookies
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiepath); // Viktigt för att skicka med sessionens cookies
    curl_setopt($ch, CURLOPT_TIMEOUT, $tmeout);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $userData = curl_exec($ch);
    $userData = json_decode($userData, true);
    curl_close($ch);

    echo "<div style='background-color:lightgreen; border:1px solid black'>";
    echo '$userData<br><pre>';
    echo print_r($userData) . "</pre><br>";
    echo "</div>";
}
?>