<?php
require '../libraries/vendor/autoload.php';

mof\session();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('POST', 'https://graph.facebook.com/v2.7/me', array('form_params' => array(
   'access_token' => $token,
   'fields' => 'id,email,first_name,last_name,link,name'
)));
$profile = json_decode($response->getBody(), true);

$email = $profile['email'];
mof\restore($users);
if (array_key_exists($email, $users)) {
   $user = $users[$email];
} else {
   $user = array();
   $user['firstname'] = $profile['first_name'];
   $user['lastname'] = $profile['last_name'];
   $users[$email] = $user;
   mof\store($users);
}
$user['email'] = $email;

mof\json(array('status' => 'ok', 'user' => $user));
?>
