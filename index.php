<?php
require 'authorization/common/config.php';
unset($config['secure']);
$config = json_encode($config);
?>
<!doctype html>
<html lang="es" ng-app="Application">
   <head>
      <meta charset="utf-8" />
      <title>Satellizer Demo</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
      <!--link rel="shortcut icon" href="resources/images/application.ico"-->
      <link rel="stylesheet" href="resources/styles/default.css" />
      <link rel="stylesheet" href="resources/styles/fonts.css" />
      <link rel="stylesheet" href="bower_components/angular-material/angular-material.min.css" />
      <link rel="stylesheet" href="bower_components/angular-material-icons/angular-material-icons.css" />

      <script>
         const config = JSON.parse('<?php print($config); ?>');
      </script>
   </head>
   <body ng-controller="Application" ng-cloak>
      <md-backdrop class="md-opaque busy" ng-if="public.busy"></md-backdrop>

      <div ng-controller="Login" class="container">
         <h1>Authentificallizer</h1>
   
         <p class="error" ng-if="error && !user.authenticated">No se pudo iniciar sesión</p>

         <p ng-if="user.authenticated">Bienvenido {{user.firstname}} {{user.lastname}}, tu correo electrónico es {{user.email}}</p>

         <div ng-if="!user.authenticated">
            <md-button ng-click="authenticate('local')" class="local" ng-if="provider('local')">
               <md-tooltip md-direction="top" md-autohide="true">Inciar sesión en el servidor local</md-tooltip>
               <ng-md-icon icon="login"></ng-md-icon>
               Iniciar sesión
            </md-button>
      
            <md-button ng-click="authenticate('facebook')" class="facebook" ng-if="provider('facebook')">
               <md-tooltip md-direction="top" md-autohide="true">Inciar con Facebook</md-tooltip>
               <ng-md-icon icon="facebook"></ng-md-icon>
               Facebook
            </md-button>
      
            <md-button ng-click="authenticate('google')" class="google" ng-if="provider('google')">
               <md-tooltip md-direction="top" md-autohide="true">Inciar con Google+</md-tooltip>
               <ng-md-icon icon="google-plus"></ng-md-icon>
               Google
            </md-button>
      
            <md-button ng-click="authenticate('live')" class="microsoft" ng-if="provider('microsoft')">
               <md-tooltip md-direction="top" md-autohide="true">Inciar con Microsoft Live</md-tooltip>
               <ng-md-icon icon="windows"></ng-md-icon>
               Microsoft
            </md-button>
      
            <md-button ng-click="authenticate('yahoo')" class="yahoo" ng-if="provider('yahoo')">
               <md-tooltip md-direction="top" md-autohide="true">Inciar con Yahoo!</md-tooltip>
               <ng-md-icon icon="yahoo"></ng-md-icon>
               Yahoo
            </md-button>
         </div>

         <md-button href="logout.php" class="close" ng-if="user.authenticated">
            <md-tooltip md-direction="top" md-autohide="true">Cerrar sesión</md-tooltip>
            <ng-md-icon icon="logout"></ng-md-icon>
            Cerrar sesión
         </md-button>
      </div>

      <script src="bower_components/angular/angular.min.js"></script>
      <script src="bower_components/angular-aria/angular-aria.min.js"></script>
      <script src="bower_components/angular-animate/angular-animate.min.js"></script>
      <script src="bower_components/angular-material/angular-material.min.js"></script>
      <script src="bower_components/angular-material-icons/angular-material-icons.min.js"></script>
      <script src="bower_components/satellizer/dist/satellizer.js"></script> <!-- La nomenclatura de Satellizer no encaja -->

      <script src="application/module.js"></script>
      <script src="application/config.js"></script>
      <script src="application/login.js"></script>
   </body>
</html>
