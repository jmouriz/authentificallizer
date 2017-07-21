<?php
require 'libraries/vendor/autoload.php';
require 'common/config.php';

session_start();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://www.googleapis.com/plus/v1/people/me/openIdConnect', array('headers' => array(
   'Authorization' => "Bearer $token"
)));
$profile = json_decode($response->getBody(), true);

$user = array();
$user['email'] = $profile['email'];
$user['firstname'] = $profile['given_name'];
$user['lastname'] = $profile['family_name'];

json(array('status' => 'ok', 'user' => $user));
?>

