<?php namespace Core;
class Conectar{
	private $db_config;
	private $host, $user, $pass, $db, $charset;

	public function __construct(){
		$db_config = require 'Config/database.php';
		$this->host = $db_config['host'];
		$this->user = $db_config['user'];
		$this->pass = $db_config['pass'];
		$this->db = $db_config['db'];
		$this->charset = $db_config['charset'];
	}
	public function conexion(){
		$con = new \mysqli($this->host, $this->user, $this->pass, $this->db);
		if($con->connect_errno)echo "Error al conectar con la base de datos";
		$con->query("SET NAMES '".$this->charset."'");
		return $con;
	}
}
?>