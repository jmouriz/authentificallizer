<?php
require '../model/user.php';
require 'server.php';

mof\session();

$authorized = (mof\input('authorized', 'no') === 'yes');
$email = mof\logged();
$request = OAuth2\Request::createFromGlobals();
$response = new OAuth2\Response();
$user = new User();

$_SESSION['client'] = mof\input('client_id');
$_SESSION['resources'] = explode(' ', mof\input('scope'));

function show($template) {
   require "../templates/$template.php";
   exit();
}

function authorize($email) {
   global $user;
   $_SESSION['firstname'] = $user->first_name;
   show('authorize');
}

if (!$server->validateAuthorizeRequest($request, $response)) {
   $response->send();
   die;
}

if (empty($_POST)) {
   if ($email) {
      $user->select($email);
      authorize($email);
   } else {
      show('login');
   }
}

if (!$authorized) {
   $email = mof\input('email');
   $password = mof\input('password');

   if ($user->login($email, $password)) {
      mof\login($email);
      authorize($email);
   }
}

$server->handleAuthorizeRequest($request, $response, $authorized, $email);

if ($authorized) {
   $code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=')+5, 40);
   // exit("Authorization Code: $code");
}

$response->send();
?>
