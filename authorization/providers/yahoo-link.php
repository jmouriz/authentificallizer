<?php
require '../libraries/vendor/autoload.php';
require '../model/user.php';

mof\session();
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

$user = new User();
if (!$user->select($email)) {
   $user->username = $email;
   $user->first_name = $profile['givenName'];
   $user->last_name = $profile['familyName'];
   $user->register;
}
$response = array();
$response['email'] = $user->email;
$response['firstname'] = $user->first_name;
$response['lastname'] = $user->last_name;

mof\json(array('status' => 'ok', 'user' => $response));
?>
