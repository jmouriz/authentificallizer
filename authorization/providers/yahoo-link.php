<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

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

$response = json_encode(array('status' => 'ok', 'user' => $user));
$origin = $_SERVER['HTTP_ORIGIN'];
$length = strlen($response);
header("Access-Control-Allow-Origin: $origin");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=utf-8");
header("Content-Length: $length");
print $response;
?>

