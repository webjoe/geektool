<?php
include("settings.php");

# var_dump($argv); // Verifying CLI Arguments

// Get the Host Name from CLI
if(array_search('-h', $argv))
{
	(integer)$key = array_search('-h', $argv);
	$host = $argv[$key+1];
}
else
{
	echo "No host specified.  Use chartbeat.php -h [host]\n";
}

//Get the Path form CLI
if(array_search('-p', $argv))
{
	(integer)$key = array_search('-p', $argv);
	$pathx = $argv[$key+1];
}

$apikey = $chartbeat[$host];
$path = "";

// http://api.chartbeat.com/live/quickstats/?host=[host]&path=[path]&apikey=[apikey]
// REST API Docs: http://chartbeat.pbworks.com/w/page/29751979/quickstats
$chartbeat_rest_url = "http://api.chartbeat.com/live/quickstats/?host=$host&path=$path&apikey=$apikey";

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $chartbeat_rest_url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// grab URL and pass it to the browser
$response = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

$jsonO = json_decode($response);

echo $jsonO->{'people'};

?>