<?php
// Funcion para crear DB instante
  class DB {
    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

    private function __construct() {
      try {
        $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/user'), Config::get('mysql/password'));

      } catch(PDOException $e) {
        die($e->getMessage());
      }
    }
    public static function getInstance() {
      if(!isset(self::$_instance)) {
        self::$_instance = new DB();
      }
      return self::$_instance;
    }

    //generic query method. Uset for publicly query or colling from another classes
    public function query($sql, $params = array()) {
      // reset the query error to not return error for previous query
      $this->_error = false;
      // check if the query is prepare
      if($this->_query = $this->_pdo->prepare($sql)) {
        // Check if params ar corect
        $x = 1;
        if(count($params)) {
          foreach ($params as $param) {
            $this->_query->bindValue($x, $param);
            $x++;
          }
        }
        // execute anyway
        if ($this->_query->execute()) {
          // return as an object
          $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
          // update count
          $this->_count = $this->_query->rowCount();
        } else {
          $this->_error = true;
        }
      }
      return $this;
    }

    // To perform action on database - delete access modify quickly
    public function action($action, $table, $where = array()) {
      if (count($where) === 3) {
        $operators = array('=', '>', '<', '>=', '<=');

        $field    = $where[0];
        $operator = $where[1];
        $value    = $where[2];

        if (in_array($operator, $operators)) {
          $sql = "{$action} FROM {$table} WHER {$field} ?";
          if (!$this->query($sql, array($value))->error()) {
            return $this;
          }
        }
      }
      return false;

    }

    public function get($table, $where) {
      return $this->action('SELECT *', $table, $where);
    }

    public function results() {
      return $this->_results;
    }

    public function delete($table, $where) {
      return $this->action('DELETE', $table, $where);
    }

    public function insert($table, $fields = array()) {
      if (count($fields)) {
        $keys = array_keys($fields);
        $values = '';
        $x = 1;

        foreach ($fields as $field) {
          $values .= '?';
          if ($x < count($fields)) {
            $values .= ', ';
          }
          $x++;
        }

        $sql = "INSERT INTO users (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

        if (!$this->query($sql, $fields)->error()) {
          return true;
        }

      }
      return false;
    }

    public function error() {
      return $this->_error;
    }

    public function count() {
      return $this->_count;
    }

  }

 ?>
