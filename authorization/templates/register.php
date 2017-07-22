<?php
require '../libraries/vendor/autoload.php';

mof\session();

if (!array_key_exists('redirect', $_SESSION)) {
   $_SESSION['redirect'] = $_SERVER['HTTP_REFERER'];
}

$username = mof\input('username');
$email = mof\input('email');
$firstname = mof\input('firstname');
$lastname = mof\input('lastname');
$password = mof\input('password');
$exists = false;
$incomplete = false;

if ($username || $email || $firstname || $lastname || $password) {
   if ($username && $email && $firstname && $lastname && $password) {
      mof\restore($users);
      if (array_key_exists($username, $users)) {
         $exists = true;
      } else {
         $users[$username]['email'] = $email;
         $users[$username]['firstname'] = $firstname;
         $users[$username]['lastname'] = $lastname;
         $users[$username]['password'] = mof\password($password);
         mof\store($users);
         mof\login($username);
         mof\redirect($_SESSION['redirect']);
      }
   } else {
      $incomplete = true;
   }
}
?>
<!doctype html>
<html>
   <head>
      <base href="../../" />
      <meta charset="utf-8" />
      <title>Registro</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
      <link rel="shortcut icon" href="resources/images/application.ico">
      <link rel="stylesheet" href="resources/styles/fonts.css" />
      <link rel="stylesheet" href="resources/styles/default.css" />
   </head>
   <body>
      <div class="container">
         <form method="post">
            <h4>Registro de cuenta</h4>
            <?php if ($exists): ?>
            <p class="error">El usuario ya existe, por favor, elige otro nombre</p>
            <?php endif ?>
            <?php if ($incomplete): ?>
            <p class="error">Faltan datos</p>
            <?php endif ?>
            <input name="username" type="text" placeholder="Usuario" value="<?php print $username; ?>" /><br />
            <input name="email" type="email" placeholder="Correo electrónico" value="<?php print $email; ?>" /><br />
            <input name="firstname" type="text" placeholder="Nombre" value="<?php print $firstname; ?>" /><br />
            <input name="lastname" type="text" placeholder="Apellido" value="<?php print $lastname; ?>" /><br />
            <input name="password" type="password" placeholder="Contraseña" /><br />
            <button type="submit">Listo</button>
            <button type="reset">Cancelar</button>
         </form>
      </div>
   <body>
</html>
