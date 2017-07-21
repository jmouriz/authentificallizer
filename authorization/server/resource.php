<?php
require 'server.php';

if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
   $server->getResponse()->send();
   die;
}

$token = $server->getAccessTokenData(OAuth2\Request::createFromGlobals());
echo json_encode(array('success' => true, 'message' => '¡Ya estás usando mi API!')); // $token['user_id']
?>
