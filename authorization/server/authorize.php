<?php
require 'server.php';

$client = $_GET['client_id'];
$request = OAuth2\Request::createFromGlobals();
$response = new OAuth2\Response();

if (!$server->validateAuthorizeRequest($request, $response)) {
   $response->send();
   die;
}

if (empty($_POST)) {
   require '../templates/authorize.php';
   exit();
}

$authorized = ($_POST['authorized'] === 'yes');
$server->handleAuthorizeRequest($request, $response, $authorized);

if ($authorized) {
   $code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=')+5, 40);
   // exit("Authorization Code: $code");
}

$response->send();
?>
