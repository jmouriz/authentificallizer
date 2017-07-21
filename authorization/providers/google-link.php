<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

session_start();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://www.googleapis.com/plus/v1/people/me/openIdConnect', array('headers' => array(
   'Authorization' => "Bearer $token"
)));
$profile = json_decode($response->getBody(), true);

$user = array();
$user['email'] = $profile['email'];
$user['firstname'] = $profile['given_name'];
$user['lastname'] = $profile['family_name'];

$response = json_encode(array('status' => 'ok', 'user' => $user));
$origin = $_SERVER['HTTP_ORIGIN'];
$length = strlen($response);
header("Access-Control-Allow-Origin: $origin");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=utf-8");
header("Content-Length: $length");
print $response;
?>

