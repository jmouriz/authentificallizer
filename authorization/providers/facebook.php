<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

$client = new GuzzleHttp\Client();
$code = mof\input('code');

if (!$code) {
   exit();
}

$response = $client->request('POST', 'https://graph.facebook.com/v2.7/oauth/access_token', array('form_params' => array(
   'code' => $code,
   'client_id' => $config['facebook-application-id'],
   'redirect_uri' => $config['facebook-authorization-provider'],
   'client_secret' => $config['secure']['facebook-application-secret']
)));
$token = json_decode($response->getBody(), true);

mof\session();
$_SESSION['token'] = $token['access_token'];
?>
