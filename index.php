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
      <link rel="shortcut icon" href="resources/images/application.ico">
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

      <div ng-controller="Login" class="login">
         <h1>AngularJS Satellizer Demo</h1>
   
         <h4 ng-if="user.authenticated">Bienvenido {{user.firstname}} {{user.lastname}}, tu correo electrónico es {{user.email}}</h4>

         <md-button ng-click="authenticate('local')" class="local">
            <md-tooltip md-direction="top" md-autohide="true">Inciar con el servidor local</md-tooltip>
            <ng-md-icon icon="favorite"></ng-md-icon>
            LOCAL
         </md-button>
   
         <md-button ng-click="authenticate('facebook')" class="facebook">
            <md-tooltip md-direction="top" md-autohide="true">Inciar con Facebook</md-tooltip>
            <ng-md-icon icon="facebook"></ng-md-icon>
            facebook
         </md-button>
   
         <md-button ng-click="authenticate('google')" class="google">
            <md-tooltip md-direction="top" md-autohide="true">Inciar con Google+</md-tooltip>
            <ng-md-icon icon="google-plus"></ng-md-icon>
            google
         </md-button>
   
         <md-button ng-click="authenticate('live')" class="microsoft">
            <md-tooltip md-direction="top" md-autohide="true">Inciar con Microsoft</md-tooltip>
            <ng-md-icon icon="windows"></ng-md-icon>
            microsoft
         </md-button>
   
         <md-button ng-click="authenticate('yahoo')" class="yahoo">
            <md-tooltip md-direction="top" md-autohide="true">Inciar con Yahoo!</md-tooltip>
            <ng-md-icon icon="yahoo"></ng-md-icon>
            yahoo
         </md-button>
      </div>

      <script src="bower_components/angular/angular.min.js"></script>
      <script src="bower_components/angular-aria/angular-aria.min.js"></script>
      <script src="bower_components/angular-animate/angular-animate.min.js"></script>
      <script src="bower_components/angular-material/angular-material.min.js"></script>
      <script src="bower_components/angular-material-icons/angular-material-icons.min.js"></script>
      <script src="bower_components/satellizer/dist/satellizer.min.js"></script> <!-- La nomenclatura de Satellizer no encaja -->

      <script src="application/module.js"></script>
      <script src="application/config.js"></script>
      <script src="application/login.js"></script>
   </body>
</html>
