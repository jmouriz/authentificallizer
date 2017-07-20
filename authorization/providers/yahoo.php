<?php
require 'libraries/vendor/autoload.php';
require 'common/config.php';

use GuzzleHttp\Client;

$client = new GuzzleHttp\Client();

$response = $client->request('POST', 'https://api.login.yahoo.com/oauth2/get_token', array('form_params' => array(
   'code' => $_GET['code'],
   'client_id' => $config['yahoo-application-id'],
   'redirect_uri' => $config['yahoo-authorization-provider'],
   'client_secret' => $config['secure']['yahoo-application-secret'],
   'grant_type' => 'authorization_code'
)));
$token = json_decode($response->getBody(), true);

session_start();
$_SESSION['token'] = $token['access_token'];
?>
