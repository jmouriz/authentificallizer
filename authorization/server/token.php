<?php
require 'server.php';

$server = new OAuth2\Server($storage, array('allow_implicit' => true));
$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
?>
