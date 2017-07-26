<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

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

mof\restore($users);
if (!array_key_exists($email, $users)) {
   $user = array();
   $user['firstname'] = $profile['givenName'];
   $user['lastname'] = $profile['familyName'];
   $users[$email] = $user;
   mof\store($users);
} else {
   $user = $users[$email];
}
$user['email'] = $email;

mof\json(array('status' => 'ok', 'user' => $user));
?>
