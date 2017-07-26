<?php
$config = array();

$base = 'http://127.0.0.1/authentificallizer/authorization';
$server = "$base/server";
$providers = "$base/providers";
$path = __DIR__;

$config['secure']['database-connection-string'] = "sqlite:$path/../authorization.db";
$config['secure']['database-username'] = 'DATABASE USERNAME';
$config['secure']['database-password'] = 'DATABASE PASSWORD';

$config['authorization-endpoint'] = "$server/authorize.php";
$config['get-token-endpoint'] = "$server/token.php";
$config['resource-api-endpoint'] = "$server/resource.php";

$config['local-application-id'] = 'Authentificallizer Demo';
$config['google-application-id'] = false; // GOOGLE APPLICATION ID
$config['yahoo-application-id'] = false; // YAHOO APPLICATION ID
$config['microsoft-application-id'] = false; // MICROSOFT APPLICATION ID
$config['facebook-application-id'] = false; // FACEBOOK APPLICATION ID

$config['secure']['local-application-secret'] = '1234567890';
$config['secure']['google-application-secret'] = 'GOOGLE APPLICATION SECRET';
$config['secure']['yahoo-application-secret'] = 'YAHOO APPLICATION SECRET';
$config['secure']['microsoft-application-secret'] = 'MICROSOFT APPLICATION SECRET';
$config['secure']['facebook-application-secret'] = 'FACEBOOK APPLICATION SECRET';

$config['local-authorization-provider'] = "$providers/local.php";
$config['google-authorization-provider'] = "$providers/google.php";
$config['yahoo-authorization-provider'] = "$providers/yahoo.php";
$config['microsoft-authorization-provider'] = "$providers/microsoft.php";
$config['facebook-authorization-provider'] = "$providers/facebook.php";

$config['local-authorization-provider-link'] = "$providers/local-link.php";
$config['google-authorization-provider-link'] = "$providers/google-link.php";
$config['yahoo-authorization-provider-link'] = "$providers/yahoo-link.php";
$config['microsoft-authorization-provider-link'] = "$providers/microsoft-link.php";
$config['facebook-authorization-provider-link'] = "$providers/facebook-link.php";
?>
