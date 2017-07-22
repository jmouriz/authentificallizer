<?php
$config = array();

$base = 'https://127.0.0.1/satellizer-full-stack-demo/authorization';
$server = "$base/server";
$providers = "$base/providers";

$config['authorization-endpoint'] = "$server/authorize.php";
$config['get-token-endpoint'] = "$server/token.php";
$config['resource-api-endpoint'] = "$server/resource.php";

$config['local-application-id'] = 'testclient';
$config['google-application-id'] = 'GOOGLE APPLICATION ID';
$config['yahoo-application-id'] = 'YAHOO APPLICATION ID';
$config['microsoft-application-id'] = 'MICROSOFT APPLICATION ID';
$config['facebook-application-id'] = 'FACEBOOK APPLICATION ID';

$config['secure']['local-application-secret'] = 'testpass';
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
