<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

$client = new GuzzleHttp\Client();

$response = $client->request('POST', $config['get-token-endpoint'], array('form_params' => array(
   'code' => $_GET['code'],
   'grant_type' => 'authorization_code',
   'client_id' => $config['local-application-id'],
   'redirect_uri' => $config['local-authorization-provider'],
   'client_secret' => $config['secure']['local-application-secret']
)));
$token = json_decode($response->getBody(), true);

session_start();
$_SESSION['token'] = $token['access_token'];
?>
