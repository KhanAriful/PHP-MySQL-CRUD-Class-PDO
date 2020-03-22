<?php
class SQL {
	protected $hostname;
	protected $username;
	protected $password;
	protected $dbname;
	protected $charset;
	protected $pdo;
	public function __construct($hostname, $username, $password, $dbname, $charset){
		$this->hostname = $hostname;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
		$this->charset = $charset;
		$this->connect();
	}
  	public function connect(){
		try{
		    $this->pdo = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->dbname . ";charset=" . $this->charset, $this->username, $this->password);
		    /* Set the PDO error mode to exception */
		    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
		    die("ERROR: Could not connect. " . $e->getMessage());
		}
		return $this->pdo;
	}
	public function getData($sql){
	    try{
	        $result = $this->pdo->query($sql);
	        if($result->rowCount() > 0){
	            while($row = $result->fetch()){
	                $rows[] = $row;
	            }
	            unset($result);
	        } else{
	            echo "No records matching your query were found.";
	        }
	    } catch(PDOException $e){
	        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
	    }
	    return $rows;
	}
	public function execute($sql){
	    try{
	        $this->pdo->exec($sql);
	    } catch(PDOException $e){
	        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
	    }
	}
	public function __destruct(){
		unset($this->pdo);
	}
}