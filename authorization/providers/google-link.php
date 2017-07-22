<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

mof\session();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://www.googleapis.com/plus/v1/people/me/openIdConnect', array('headers' => array(
   'Authorization' => "Bearer $token"
)));
$profile = json_decode($response->getBody(), true);

$email = $profile['email'];
$hash = hash('md5', $email);
mof\restore($users);
if (!array_key_exists($hash, $users)) {
   $user = array();
   $user['email'] = $email;
   $user['firstname'] = $profile['given_name'];
   $user['lastname'] = $profile['family_name'];
   $users[$hash] = $user;
   mof\store($users);
} else {
   $user = $users[$hash];
}

mof\json(array('status' => 'ok', 'user' => $user));
?>
