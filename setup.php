<?php
require 'authorization/common/config.php';
$path = __DIR__;
$db = new PDO("sqlite:$path/authorization/server/authorization.db");
$sql = file_get_contents("$path/database/schema.sql");
$db->exec($sql);
$sentence = $db->prepare('insert into oauth_clients (client_id, client_secret, redirect_uri) values (:client, :password, :uri)');
$sentence->bindParam(':client', $config['local-application-id']);
$sentence->bindParam(':password', $config['secure']['local-application-secret']);
$sentence->bindParam(':uri', $config['local-authorization-provider']);
$sentence->execute();
?>
<!doctype html>
<html lang="es">
   <head>
      <meta charset="utf-8" />
      <title>Instalación</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
      <link rel="shortcut icon" href="resources/images/application.ico">
      <link rel="stylesheet" href="resources/styles/fonts.css" />
      <link rel="stylesheet" href="resources/styles/setup.css" />
   </head>
   <body>
      <h2>Bien hecho</h2>
      <p>Ya puedes comenzar, asegúrate de haber configurado correctamente las URL de redirección en el archivo <b>authorization/common/config.php</b>:</p>
      <ul>
         <li><b>Google</b>: <?php print $config['google-authorization-provider']; ?> <a href="https://console.cloud.google.com/">Configurar</a></li>
         <li><b>Microsoft</b>: <?php print $config['microsoft-authorization-provider']; ?> <a href="https://apps.dev.microsoft.com/">Configurar</a></li>
         <li><b>Yahoo</b>: <?php print $config['yahoo-authorization-provider']; ?> <a href="https://developer.yahoo.com/">Configurar</a></li>
         <li><b>Facebook</b>: <?php print $config['facebook-authorization-provider']; ?> <a href="https://developers.facebook.com/">Configurar</a></li>
      </ul>
      </p>Puedes <a href="index.php">comenzar</a> una vez que hayas configurado todos los proveedores.</p>
   </body>
</html>
