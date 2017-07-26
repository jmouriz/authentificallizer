<?php
require '../libraries/vendor/autoload.php';
require '../model/user.php';

mof\session();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('POST', 'https://graph.facebook.com/v2.7/me', array('form_params' => array(
   'access_token' => $token,
   'fields' => 'id,email,first_name,last_name,link,name'
)));
$profile = json_decode($response->getBody(), true);

$email = $profile['email'];
$user = new User();
if (!$user->select($email)) {
   $user->username = $email;
   $user->first_name = $profile['first_name'];
   $user->last_name = $profile['last_name'];
   $user->register;
}
$response = array();
$response['email'] = $user->email;
$response['firstname'] = $user->first_name;
$response['lastname'] = $user->last_name;

mof\json(array('status' => 'ok', 'user' => $response));
?>
