<?php
$path = __DIR__;
require "$path/../common/config.php";
require "$path/../common/model.php";

class User extends Model {
   protected $fields = array('username', 'password', 'first_name', 'last_name', 'phone');
   private $table = 'oauth_users';

   public function __construct() {
      global $config;
      parent::__construct($config['secure']['database-connection-string'], $config['secure']['database-username'], $config['secure']['database-password']);
   }

   public function id($username) {
      $this->username = $username;
   }

   public function all() {
      $query = $this->query("select * from {$this->table}");
      return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   public function select($username) {
      $this->id($username);
      $query = $this->query("select * from {$this->table} where username = :username");
      $data = $query->fetch(PDO::FETCH_OBJ);
      if ($data) {
         $this->data = $data;
      }
      return $data;
   }

   public function delete($username) {
      $this->id($username);
      $this->query("delete from {$this->table} where username = :username");
   }

   public function login($username, $password) {
      $user = $this->select($username);
      return $user ? (sha1($password) == $user->password) : false;
   }

   public function register() {
      $this->query("insert into {$this->table} (username, password, first_name, last_name, phone) values (:username, :password, :first_name, :last_name, :phone)");
   }
}
?>
