<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

mof\session();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://graph.microsoft.com/v1.0/me', array('headers' => array(
   'Authorization' => "Bearer $token"
)));
$profile = json_decode($response->getBody(), true);

$email = $profile['userPrincipalName'];
mof\restore($users);
if (array_key_exists($email, $users)) {
   $user = array();
   $user['firstname'] = $profile['givenName'];
   $user['lastname'] = $profile['surname'];
   $users[$email] = $user;
   mof\store($users);
} else {
   $user = $users[$email];
}
$user['email'] = $email;

mof\json(array('status' => 'ok', 'user' => $user));
?>
