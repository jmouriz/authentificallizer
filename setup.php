<?php
require 'authorization/libraries/vendor/autoload.php';
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
$users = [];
mof\store($users);
?>
<!doctype html>
<html lang="es">
   <head>
      <meta charset="utf-8" />
      <title>Instalación</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
      <link rel="shortcut icon" href="resources/images/application.ico">
      <link rel="stylesheet" href="resources/styles/fonts.css" />
      <link rel="stylesheet" href="resources/styles/default.css" />
      <link rel="stylesheet" href="resources/styles/setup.css" />
   </head>
   <body>
      <div class="container">
         <h2>Ya puedes comenzar...</h2>
         <p>Ahora debes configurar las URL de redirección en el panel del desarrollador de los proveedores que desees utilizar. Luego edita los valores del archivo <b>authorization/common/config.php</b> para incorporar las claves de cada uno:</p>
         <table>
            <thead>
               <tr>
                  <th>Proveedor</th>
                  <th colspan="2">URL de redirección</th>
               </tr>
            </thead>
            </tbody>
               <tr>
                  <th>Google+</th>
                  <td><?php print $config['google-authorization-provider']; ?></td>
                  <td><a href="https://console.cloud.google.com/">Configurar</a></td>
               </tr>
               <tr>
                  <th>Microsoft</th>
                  <td><?php print $config['microsoft-authorization-provider']; ?></td>
                  <td><a href="https://apps.dev.microsoft.com/">Configurar</a></td>
               </tr>
               <tr>
                  <th>Yahoo!</th>
                  <td><?php print $config['yahoo-authorization-provider']; ?></td>
                  <td><a href="https://developer.yahoo.com/">Configurar</a></td>
               </tr>
               <tr>
                  <th>Facebook</th>
                  <td><?php print $config['facebook-authorization-provider']; ?></td>
                  <td><a href="https://developers.facebook.com/">Configurar</a></td>
               </tr>
            </tbody>
         </table>
         </p>O puedes <a href="index.php">comenzar ahora</a> a usar la autentificación local.</p>
      </div>
   </body>
</html>
