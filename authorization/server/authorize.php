<?php
require 'server.php';

mof\session();

$authorized = (mof\input('authorized', 'no') === 'yes');
$username = mof\logged();
$request = OAuth2\Request::createFromGlobals();
$response = new OAuth2\Response();

$_SESSION['client'] = mof\input('client_id');
$_SESSION['resources'] = explode(' ', mof\input('scope'));

function show($template) {
   require "../templates/$template.php";
   exit();
}

function authorize($username) {
   if (!defined($users)) {
      mof\restore($users);
   }
   $_SESSION['firstname'] = $users[$username]['firstname'];
   $_SESSION['lastname'] = $users[$username]['lastname'];
   show('authorize');
}

if (!$server->validateAuthorizeRequest($request, $response)) {
   $response->send();
   die;
}

if (empty($_POST)) {
   if ($username) {
      authorize($username);
   } else {
      show('login');
   }
}

if (!$authorized) {
   $username = mof\input('username');
   $password = mof\input('password');

   mof\restore($users);
   if (array_key_exists($username, $users)) {
      if (mof\password($password, $users[$username]['password'])) {
         mof\login($username);
         authorize($username);
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
