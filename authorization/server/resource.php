<?php
require '../model/user.php';
require 'server.php';

$request = OAuth2\Request::createFromGlobals();
$response = new OAuth2\Response();

if (!$server->verifyResourceRequest($request, $response, 'email')) {
   $server->getResponse()->send();
   die;
}

if (!$server->verifyResourceRequest($request, $response, 'profile')) {
   $server->getResponse()->send();
   die;
}

$token = $server->getAccessTokenData($request);
$email = $token['user_id'];

$user = new User();
$response = (array) $user->select($email);

mof\json($response);
?>
