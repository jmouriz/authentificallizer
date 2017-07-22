<?php
require_once 'server.php';

$client = $_GET['client_id'];
$request = OAuth2\Request::createFromGlobals();
$response = new OAuth2\Response();

if (!$server->validateAuthorizeRequest($request, $response)) {
   $response->send();
   die;
}

if (empty($_POST)) {
   $response = <<<EOT
<html>
   <head>
      <base href="../../" />
      <meta charset="utf-8" />
      <title>Autorizar aplicación</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
      <link rel="shortcut icon" href="resources/images/application.ico">
      <link rel="stylesheet" href="resources/styles/fonts.css" />
   </head>
   <body>
      <center>
         <form method="post">
            <p>¿Quieres permitirle a <b>$client</b> a acceder a tus datos del perfil?</p>
            <button type="submit" name="authorized" value="yes">Sí</button>
            <button type="submit" name="authorized" value="no">No</button>
         </form>
      </center>
   <body>
</html>
EOT;
   exit($response);
}

$authorized = ($_POST['authorized'] === 'yes');
$server->handleAuthorizeRequest($request, $response, $authorized);

if ($authorized) {
   $code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=')+5, 40);
   // exit("Authorization Code: $code");
}

$response->send();
?>
