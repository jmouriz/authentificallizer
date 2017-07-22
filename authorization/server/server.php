<?php
require '../libraries/vendor/autoload.php';

$path = __DIR__;
$connection = "sqlite:$path/authorization.db";
$username = null;
$password = null;

OAuth2\Autoloader::register();

$storage = new OAuth2\Storage\Pdo(array('dsn' => $connection, 'username' => $username, 'password' => $password));
$server = new OAuth2\Server($storage);
$server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
$server->addGrantType(new OAuth2\GrantType\RefreshToken($storage));
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));
$scope = new OAuth2\Scope(array('supported_scopes' => array('email', 'profile')));
$server->setScopeUtil($scope);
?>
