<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

$client = new GuzzleHttp\Client();

$response = $client->request('POST', 'https://login.microsoftonline.com/common/oauth2/v2.0/token', array('form_params' => array(
   'code' => $_GET['code'],
   'client_id' => $config['microsoft-application-id'],
   'redirect_uri' => $config['microsoft-authorization-provider'],
   'client_secret' => $config['secure']['microsoft-application-secret'],
   'grant_type' => 'authorization_code'
)));
$token = json_decode($response->getBody(), true);

mof\session();
$_SESSION['token'] = $token['access_token'];
?>
