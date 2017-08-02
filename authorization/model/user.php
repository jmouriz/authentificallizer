<?php
$path = __DIR__;
require "$path/../common/model.php";

class User extends Model {
   protected $fields = array('username', 'password', 'first_name', 'last_name', 'phone');
   protected $table = 'oauth_users';
   protected $key = 'username';

   public function login($key, $password) {
      $user = $this->select($key);
      return $user ? (sha1($password) == $user->password) : false;
   }

   public function register() {
      $this->insert();
   }
}
?>
