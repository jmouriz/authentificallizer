<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

session_start();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('POST', $config['resource-api-endpoint'], array('form_params' => array(
   'access_token' => $token
)));
$profile = json_decode($response->getBody(), true);

$user = array();
$user['email'] = $profile['email'];
$user['firstname'] = $profile['firstname'];
$user['lastname'] = $profile['lastname'];

$response = json_encode(array('status' => 'ok', 'user' => $user));
$origin = $_SERVER['HTTP_ORIGIN'];
$length = strlen($response);
header("Access-Control-Allow-Origin: $origin");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=utf-8");
header("Content-Length: $length");
print $response;
?>

