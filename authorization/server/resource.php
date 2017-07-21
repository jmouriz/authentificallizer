<?php
require 'server.php';

if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
   $server->getResponse()->send();
   die;
}
echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));
?>
