<?php
$path = __DIR__;
require "$path/../common/config.php";
require "$path/../common/model.php";

class User extends Model {
   protected $fields = array('email', 'password', 'firstname', 'lastname', 'phone');

   public function __construct() {
      global $config;
      parent::__construct($config['secure']['database-connection-string'], $config['secure']['database-username'], $config['secure']['database-password']);
   }

   public function id($email) {
      $this->email = $email;
   }

   public function all() {
      $query = $this->query('select * from users');
      return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   public function select($email) {
      $this->id($email);
      $query = $this->query('select * from users where email = :email');
      $data = $query->fetch(PDO::FETCH_OBJ);
      if ($data) {
         $this->data = $data;
      }
      return $data;
   }

   public function delete($email) {
      $this->id($email);
      $this->query('delete from users where email = :email');
   }

   public function login($email, $password) {
      $user = $this->select($email);
      return $user ? mof\password($password, $user->password) : false;
   }

   public function register() {
      $this->query('insert into users (email, password, firstname, lastname, phone) values (:email, :password, :firstname, :lastname, :phone)');
   }
}
?>
