<?php
require '../libraries/vendor/autoload.php';
require '../model/user.php';

mof\session();
$token = $_SESSION['token'];

$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://www.googleapis.com/plus/v1/people/me/openIdConnect', array('headers' => array(
   'Authorization' => "Bearer $token"
)));
$profile = json_decode($response->getBody(), true);

$email = $profile['email'];
$user = new User();
if (!$user->select($email)) {
   $user->username = $email;
   $user->first_name = $profile['given_name'];
   $user->last_name = $profile['family_name'];
   $user->register;
}
$response = array();
$response['email'] = $user->email;
$response['firstname'] = $user->first_name;
$response['lastname'] = $user->last_name;

mof\json(array('status' => 'ok', 'user' => $response));
?>
