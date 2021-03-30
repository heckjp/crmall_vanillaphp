<?php
namespace App\model;
use PDO;
require_once('config.php');
class Database {
        private $host;
        private $database;
        private $user;
        private $password;
        private $conn;
  
    public function __construct(){
        // seta as configurações de conexão
        $this->driver=DB_DRIVER;
        $this->port=DB_PORT;
        $this->host=DB_HOST;
        $this->database=DB_NAME;
        $this->user=DB_USER;
        $this->password=DB_PASSWORD;

        // tenta realizar a conexão com o banco de dados e retorna erro caso não tenha sucesso
        try {
            $this->conn = new PDO("$this->driver:dbname=$this->database;host=$this->host;port=$this->port",$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           } catch(PDOException $e) {
               echo 'ERROR: ' . $e->getMessage();
           }
    }
    // consulta todos os dados de uma tabela
    public function getAll($table){
        $sql = "SELECT * FROM $table";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    /* consulta os dados de uma tabela passando uma condição de filtro
       Parâmetros opcionais :
       $order ordenação dos registros, $limit - limita quantidade de registros*/
    public function get($table,$where,$order=NULL,$limit=NULL){
        $sql = "SELECT * FROM $table WHERE $where";
        if($order){
            $sql.=" ORDER BY $order";
        }
        if($limit){
            $sql.= " LIMIT $limit";
        }
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    //função de inserção em uma tabela
    public function insert($table, $data) {
        $key = array_keys($data);
        $val = array_values($data);
        $sql = "INSERT INTO $table (" . implode(', ', $key) . ") "
             . "VALUES ('" . implode("', '", $val) . "')";  
        $ret = $this->conn->exec($sql)  or die(print_r($this->conn->errorInfo(), true));
        return $ret;
        
    }
   // função de edição de uma tabela
    public function update($table, $data, $where) {
    $cols = array();
 
    foreach($data as $key=>$val) {
        $cols[] = "$key = '$val'";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";
    $ret = $this->conn->exec($sql) or die(print_r($this->conn->errorInfo(), true));
    return $ret;
    }

      //função para deletar a tablea
      public function delete($table,$where){
        $sql = "DELETE from $table WHERE $where";
        $ret = $this->conn->exec($sql) or die(print_r($this->conn->errorInfo(), true));
    return $ret;
    }
    
    // executa uma consulta SQL - *** APENAS SELECT ***
    public function query($query){
        $sql = $query;
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
    //função de desconexão do banco de dados
    public function desconecta(){
        $this->conn=null;
    }
    
    
    
}