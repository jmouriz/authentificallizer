<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

mof\session();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://graph.microsoft.com/v1.0/me', array('headers' => array(
   'Authorization' => "Bearer $token"
)));
$profile = json_decode($response->getBody(), true);

$user = array();
$user['email'] = $profile['userPrincipalName'];
$user['firstname'] = $profile['givenName'];
$user['lastname'] = $profile['surname'];

mof\json(array('status' => 'ok', 'user' => $user));
?>
