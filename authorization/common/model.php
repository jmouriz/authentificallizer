<?php
require 'config.php';

class Model {
   protected $fields = array();
   protected $connection;
   protected $table;
   protected $data;
   protected $key;

   public function __construct() {
      global $config;
      $options = array(
         PDO::ATTR_PERSISTENT => true,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
      $this->connection = new PDO(
         $config['secure']['database-connection-string'],
         $config['secure']['database-username'],
         $config['secure']['database-password'],
         $options
      );
      $this->data = (object) array();
   }

   public function __destruct() {
      $this->connection = null;
   }

   public function __set($key, $value) {
      if (in_array($key, $this->fields)) {
         $this->data->$key = $value;
      }
   }

   public function __get($key) {
      if (property_exists($this->data, $key)) {
         return $this->data->$key;
      }
   }

   protected function query($sql) {
      $query = $this->connection->prepare($sql);
      foreach ($this->data as $key => $value) {
         if (preg_match("/:$key/", $sql)) {
            $query->bindValue(":$key", $value);
         }
      }
      $query->execute();
      return $query;
   }

   public function get() {
      return $this->data;
   }

   public function key($value) {
      $key = $this->key;
      $this->$key = $value;
   }

   public function all() {
      $query = $this->query("select * from {$this->table}");
      return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   public function select($key) {
      $this->key($key);
      $query = $this->query("select * from {$this->table} where {$this->key} = :{$this->key}");
      $data = $query->fetch(PDO::FETCH_OBJ);
      if ($data) {
         $this->data = $data;
      }
      return $data;
   }

   public function insert() {
      $fields = implode(',', $this->fields);
      $values = implode(',', array_map(function ($field) {
         return ":$field";
      }, $this->fields));
      $this->query("insert into {$this->table} ($fields) values ($values)");
   }

   public function delete($key) {
      $this->key($key);
      $this->query("delete from {$this->table} where {$this->key} = :{$this->key}");
   }
}
?>
