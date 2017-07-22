<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

$client = new GuzzleHttp\Client();
$code = mof\input('code');

if (!$code) {
   exit();
}

$response = $client->request('POST', 'https://accounts.google.com/o/oauth2/token', array('form_params' => array(
   'code' => $code,
   'client_id' => $config['google-application-id'],
   'redirect_uri' => $config['google-authorization-provider'],
   'client_secret' => $config['secure']['google-application-secret'],
   'grant_type' => 'authorization_code'
)));
$token = json_decode($response->getBody(), true);

mof\session();
$_SESSION['token'] = $token['access_token'];
?>
