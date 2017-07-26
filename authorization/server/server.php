<?php
require '../libraries/vendor/autoload.php';
require '../common/config.php';

OAuth2\Autoloader::register();

$storage = new OAuth2\Storage\Pdo(array(
   'dsn' => $config['secure']['database-connection-string'],
   'username' => $config['secure']['database-username'],
   'password' => $config['secure']['database-password'],
));
$server = new OAuth2\Server($storage);
$server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
$server->addGrantType(new OAuth2\GrantType\RefreshToken($storage));
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));
$scope = new OAuth2\Scope(array('supported_scopes' => array('email', 'profile')));
$server->setScopeUtil($scope);
?>
