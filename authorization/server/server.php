<?php
require '../libraries/vendor/autoload.php';

$path = __DIR__;
$dsn = "sqlite:$path/authorization.db";

OAuth2\Autoloader::register();

$storage = new OAuth2\Storage\Pdo(array('dsn' => $dsn));
$server = new OAuth2\Server($storage);
$server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
$server->addGrantType(new OAuth2\GrantType\RefreshToken($storage));
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));
?>
