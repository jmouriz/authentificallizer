<?php
require 'server.php';

$request = OAuth2\Request::createFromGlobals();

if (!$server->verifyResourceRequest($request)) {
   $server->getResponse()->send();
   die;
}

$token = $server->getAccessTokenData($request);

// $token['user_id']
$profile = array();
$profile['email'] = 'john.doe@example.com';
$profile['firstname'] = 'John';
$profile['lastname'] = 'Doe';

$response = json_encode($profile);
$origin = $_SERVER['HTTP_ORIGIN'];
$length = strlen($response);
header("Access-Control-Allow-Origin: $origin");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=utf-8");
header("Content-Length: $length");
print $response;
?>
