<?php
require 'libraries/vendor/autoload.php';
require 'common/config.php';

session_start();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://social.yahooapis.com/v1/user/me/profile?format=json', array('headers' => array(
   'Authorization' => "Bearer $token"
)));
$response = json_decode($response->getBody(), true);
$profile = $response['profile'];

foreach ($profile['emails'] as $node) {
   if ($node['primary']) {
      $email = $node['handle'];
      break;
   }
}

$user = array();
$user['email'] = $email;
$user['firstname'] = $profile['givenName'];
$user['lastname'] = $profile['familyName'];

json(array('status' => 'ok', 'user' => $user));
?>

