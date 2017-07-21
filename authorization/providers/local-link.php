<?php
require '../libraries/vendor/autoload.php';

session_start();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('POST', 'https://localhost/~juanma/satellizar-full-stack-demo/authorization/server/resource.php', array('form_params' => array(
   'access_token' => $token
)));
$profile = json_decode($response->getBody(), true);

$user = array();
$user['email'] = $profile['email'];
$user['firstname'] = $profile['first_name'];
$user['lastname'] = $profile['last_name'];

json(array('status' => 'ok', 'user' => $user));
?>

