<?php
class PDOConn{

    private $host;
    private $dbname;
    private $user;
    private $password;
    private $conn;

    public function __construct(){
        $this->host = 'localhost';
        $this->dbname='icb0006_uf4_pr01';
        $this->user='root';
        $this->password='';
    }

    public function connect(){
        $this->conn=null;

        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'Connectino failed: '.$e->getMessage();
        }
        return $this->conn;
    }   

    public function insert($date, $company,$qty){
        try{
            $stmt = self::$conn->prepare("INSERT INTO orders (date,company,qty) VALUES ('". $date . "', '" .$company. "','".$qty."');"); 
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $e){
            echo "Insert failed: " . $e->getMessage();
        }
    }
}
?>