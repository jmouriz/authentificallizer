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
$user->select($email);

$response = array();
$response['email'] = $user->username;
$response['firstname'] = $user->first_name;
$response['flastname'] = $user->last_name;

mof\json($response);
?>
