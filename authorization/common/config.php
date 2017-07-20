<?php
$config = array();

$providers = "https://127.0.0.1/satellizer-full-stack-demo/authorization/providers";

$config['google-application-id'] = 'GOOGLE APPLICATION ID';
$config['yahoo-application-id'] = 'YAHOO APPLICATION ID';
$config['microsoft-application-id'] = 'MICROSOFT APPLICATION ID';
$config['facebook-application-id'] = 'FACEBOOK APPLICATION ID';

$config['secure']['google-application-secret'] = 'GOOGLE APPLICATION SECRET';
$config['secure']['yahoo-application-secret'] = 'YAHOO APPLICATION SECRET';
$config['secure']['microsoft-application-secret'] = 'MICROSOFT APPLICATION SECRET';
$config['secure']['facebook-application-secret'] = 'FACEBOOK APPLICATION SECRET';

$config['google-authorization-provider'] = "$authorization/google.php";
$config['yahoo-authorization-provider'] = "$authorization/yahoo.php";
$config['microsoft-authorization-provider'] = "$authorization/microsoft.php";
$config['facebook-authorization-provider'] = "$authorization/facebook.php";

$config['google-authorization-provider-link'] = "$authorization/google-link.php";
$config['yahoo-authorization-provider-link'] = "$authorization/yahoo-link.php";
$config['microsoft-authorization-provider-link'] = "$authorization/microsoft-link.php";
$config['facebook-authorization-provider-link'] = "$authorization/facebook-link.php";
?>
