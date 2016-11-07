<?php

interface SQLObserver{
	public function GetData($fields,$table);
	// public function InsertData($table,$newdata);
	public function fetch($result);
	public function UpdateData($table,$newdata,$condition);
	public function DeleteData($table,$condition);
	public function CloseConn();
}

function arraytostring($arr){
	$field='';
	foreach ($arr as $key => $value) {
		if($field!=null){
			$field.=',';
		}
		switch (gettype($value)) {
			case 'string':
				$field.=("'".$value."'");
				break;
			case 'integer':
				$field.=$value;
				break;
			case 'double':
				$field.=$value;
				break;
		}
	}
	var_dump($field);
}

/**
* MySQL Factory
*/
class MySQLFactory implements SQLObserver
{
	public $conn;

	function __construct($servername, $username, $password, $dbname)
	{
		$this->conn=new mysqli($servername, $username, $password, $dbname);
		if ($this->conn->connect_error) {
		    die("Connection failed: " . $this->conn->connect_error);
		} 
	}

	public function GetData($fields,$table,$condition=true){
		$sql = "SELECT $fields FROM `$table` WHERE $condition";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return FALSE;
		}
	}

	public function fetch($result){
		return $result->fetch_assoc();
	}

	public function InsertData($table,$fields,$value){
		$sql = "INSERT INTO $table ($fields) VALUES ($value)";

		if ($conn->query($sql) === TRUE) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function UpdateData($table,$newdata,$condition){
		$sql = "UPDATE $table SET $newdata WHERE $condition";

		if ($conn->query($sql) === TRUE) {
			return TRUE;
		} else {
			return FALSE;
			}
	}
	
	public function DeleteData($table,$condition){
		$sql = "DELETE FROM $table WHERE $condition";

		if ($conn->query($sql) === TRUE) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function CloseConn(){
		$this->conn->close();
	}
}

class SQLite extends SQLite3
{
	function __construct($db)
	{
		$this->open($db);
	}
}

/**
* SQLite Factory
*/
class SQLiteFactory implements SQLObserver{
	public $db;
	function __construct($db)
	{
		$this->db=new SQLite($db);
		if(!$this->db){
			die($this->db->lastErrorMsg());
		}
	}

	public function GetData($fields,$table){
		$sql ="SELECT $fields from $table;";

		$ret = $this->db->query($sql);
		return $ret;
	}

	public function fetch($result){
		return $result->fetchArray(SQLITE3_ASSOC);
	}

	public function InsertData($table,$fields,$value){
		 $sql ="INSERT INTO $table ($fields) VALUES ($value);";

		$ret = $this->db->exec($sql);
		if(!$ret){
			return FALSE;
		}
		return TRUE;
	}

	public function UpdateData($table,$newdata,$condition){
		 $sql ="UPDATE $table set $newdata where $condition;";
		$ret = $this->db->exec($sql);
		if(!$ret){
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function DeleteData($table,$condition){
		$sql ="DELETE from $table where $condition;";
		$ret = $db->exec($sql);
		if(!$ret){
			return FALSE;
		} else {
			return $db->changes();
		}
	}

	public function CloseConn(){
		 $this->db->close();
	}
}

/**
* PGSQL Factory
*/
class PGSQLFactory implements SQLObserver{
	public $conn;

	function __construct($host,$user,$pass,$db,$port=5432){
		$conn_string = "host=$host port=$port dbname=$db user=$user password=$pass";
		$this->conn = pg_connect($conn_string);
	}

	public function fetch($result){
		return pg_fetch_assoc($result);
	}

	public function GetData($fields,$table){
		$result = pg_query($this->conn, "SELECT $fields FROM $table");
		if (!$result) {
			return FALSE;
		}
		return $result;
	}
	public function InsertData($table,$newdata){
		$res=pg_insert($this->conn, $table, $newdata);
		if(!$res){
			return FALSE;
		}
		return TRUE;
	}
	public function UpdateData($table,$newdata,$condition){
		$ret=pg_update($this->conn, $table, $newdata, $condition);
		if(!$ret){
			return FALSE;
		}
		return TRUE;
	}
	public function DeleteData($table,$condition){
		$ret=pg_delete($this->conn, $table, $condition);
		if (!$ret) {
			return FALSE;
		}
		return TRUE;
	}

	public function CloseConn(){
		pg_close($this->conn);
	}
}

class SQLFacade{
	public static function CreateMySQL($servername, $username, $password, $dbname){
		return new MySQLFactory($servername, $username, $password, $dbname);
	}
	public static function CreateSQLite($db){
		return new SQLiteFactory($db);
	}
	public static function CreatePGSQL($host,$user,$pass,$db,$port=5432){
		return new PGSQLFactory($host,$user,$pass,$db,$port);
	}
}
?>
