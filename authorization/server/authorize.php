<?php
require_once 'server.php';

$request = OAuth2\Request::createFromGlobals();
$response = new OAuth2\Response();

if (!$server->validateAuthorizeRequest($request, $response)) {
   $response->send();
   die;
}

if (empty($_POST)) {
   exit('
<form method="post">
   <label>Do You Authorize TestClient?</label><br />
   <input type="submit" name="authorized" value="yes">
   <input type="submit" name="authorized" value="no">
</form>');
}

$authorized = ($_POST['authorized'] === 'yes');
$server->handleAuthorizeRequest($request, $response, $authorized);

if ($authorized) {
   $code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=')+5, 40);
   exit("SUCCESS! Authorization Code: $code");
}

$response->send();
?>
