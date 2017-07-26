<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

mof\session();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('POST', $config['resource-api-endpoint'], array('form_params' => array(
   'access_token' => $token,
   'scope' => 'email,profile'
)));
$profile = json_decode($response->getBody(), true);

mof\json(array('status' => 'ok', 'user' => $profile));
?>

