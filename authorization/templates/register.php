<?php
require '../model/user.php';

mof\session();

if (!array_key_exists('redirect', $_SESSION)) {
   $_SESSION['redirect'] = $_SERVER['HTTP_REFERER'];
}

$email = mof\input('email');
$password = mof\input('password');
$firstname = mof\input('firstname');
$lastname = mof\input('lastname');
$phone = mof\input('phone');
$exists = false;
$incomplete = false;

if ($email || $password) {
   if ($email && $password) {
      $user = new User();
      if ($user->select($email)) {
         $exists = true;
      } else {
         $user->username = $email;
         $user->password = sha1($password);
         $user->first_name = $firstname;
         $user->last_name = $lastname;
         $user->phone = $phone;
         $user->save();
         mof\login($email);
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
            <input name="email" type="email" placeholder="Correo electrónico" value="<?php print $email; ?>" required /><br />
            <input name="password" type="password" placeholder="Contraseña" required /><br />
            <input name="firstname" type="text" placeholder="Nombre" value="<?php print $firstname; ?>" /><br />
            <input name="lastname" type="text" placeholder="Apellido" value="<?php print $lastname; ?>" /><br />
            <input name="phone" type="tel" placeholder="Teléfono" value="<?php print $phone; ?>" /><br />
            <button type="submit">Listo</button>
            <button type="reset">Cancelar</button>
         </form>
      </div>
   <body>
</html>
