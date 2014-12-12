<?php
class Connection {
	public $db1 = array(
		"host" => "$base_datos.address.public:$base_datos.port",
		"user" => "$base_datos.DATABASE_USERNAME",
		"pw" => "$base_datos.DATABASE_PASSWORD",
		"db_name" => "$base_datos.DATABASE_NAME"
	);
	
	public function __construct($cdb){
		$this->cdb = $cdb;
	}
	public function query($query) {
		$k = $this->cdb;
		$i = $this->$k;
		
		$j = mysql_connect($i['host'], $i['user'], $i['pw']) or die(mysql_error());
		$connect = mysql_select_db($i['db_name'], $j) or die(mysql_error());
		$result = mysql_query($query, $j) or die(mysql_error());
		$this->result = $result;
		return $result;
	}
	
	public function fetch(){
		$rows = mysql_num_rows($this->result);
		$data = array();
		for($i=0;$i<$rows;$i++){
			$data[$i] = mysql_fetch_assoc($this->result);
		}
		return $data;
	}
}
?>