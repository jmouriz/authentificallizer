<?php
require 'server.php';

$client = mof\input('client_id');
$resources = explode(' ', mof\input('scope'));
$authorized = (mof\input('authorized', 'no') === 'yes');
$username = mof\logged();
$request = OAuth2\Request::createFromGlobals();
$response = new OAuth2\Response();

if (!$server->validateAuthorizeRequest($request, $response)) {
   $response->send();
   die;
}

if (empty($_POST)) {
   if ($username) {
      require '../templates/authorize.php';
   } else {
      require '../templates/login.php';
   }
   exit();
}

if (!$authorized) {
   $username = mof\input('username');
   $password = mof\input('password');

   mof\restore($users);
   if (array_key_exists($username, $users)) {
      if (mof\password($password, $users[$username]['password'])) {
         mof\login($username);
         require '../templates/authorize.php';
         exit();
      }
   }
}

$server->handleAuthorizeRequest($request, $response, $authorized, $username);

if ($authorized) {
   $code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=')+5, 40);
   // exit("Authorization Code: $code");
}

$response->send();
?>
