<?php
$path = __DIR__;
require "$path/../libraries/vendor/autoload.php";
require "$path/../common/config.php";

$string = $config['secure']['database-connection-string'];
$username = $config['secure']['database-username'];
$password = $config['secure']['database-password'];

ORM\connect($string, $username, $password);

class User extends ORM\Model {
   protected $columns = array('username', 'password', 'first_name', 'last_name', 'phone');
   protected $protected = array('password');
   protected $table = 'oauth_users';
   protected $key = 'username';

   public function login($key, $password) {
      $user = $this->select($key);
      return $user ? (sha1($password) == $user->password) : false;
   }
}
?>
