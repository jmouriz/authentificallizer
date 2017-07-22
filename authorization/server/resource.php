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

mof\json($profile);
?>
