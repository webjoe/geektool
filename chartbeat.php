<?php
include("settings.php");

// http://api.chartbeat.com/live/quickstats/?host=[host]&path=[path]&apikey=[apikey]

$host = "foo.com";
$apikey = $chartbeat[$host];
$path = "";

$rest = "http://api.chartbeat.com/live/quickstats/?host=$host&path=$path&apikey=$apikey";

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $rest);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// grab URL and pass it to the browser
$response = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

$jsonObject = json_decode($response);

echo $jsonObject->{'people'};

?>