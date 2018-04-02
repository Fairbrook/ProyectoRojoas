<?php namespace Core;
	class entidadBase
	{
		private $table;
		private $db;
		private $conectar;


		public function __construct($table)
		{
			$this->table = (string) $table;

			$this->conectar = new conectar();
			$this->db = $this->conectar->conexion();
		}

		public function getConectar(){
			return $this->conectar;
		}

		public function db(){
			return $this->db;
		}

		public function getError(){
			echo "<h1><b><em>Error: ".$this->db->errno."</em></b><br></h1>";
		}

		public function getAll(){
			$query = $this->db->query("SELECT * FROM {$this->table}");

			if(!$this->db->errno){
				$result = array();
				if ($query->num_rows > 0) {
					while ($row=$query->fetch_object()) {
						$result[]=$row;
					}
				}
				return $result;

			}else 
				$this->getError();
		}

		public function getById($id){
			$query = $this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
			
			if(!$this->db->errno)
				return $query->fetch_object();
			else 
				$this->getError();
		}

		public function getBy($column,$value){
			$query = $this->db->query("SELECT * FROM {$this->table} WHERE '{$column}'' = '{$value}'");

			if(!$this->db->errno){
				$result = array();
				while ($row=$query->fetch_object()) {
					$result[]=$row;
				}
				return $result;
			}else 
				$this->getError();
		}

		public function deleteById($id){
			$query = $this->db->query("DELETE FROM {$this->table} WHERE id = '{$id}'");

			if(!$this->db->errno)
				return $query;
			else 
				$this->getError();
		}

		public function deleteBy($column, $value){
			$query = $this->db->query("DELETE FROM {$this->table} WHERE '{$column}' = '{$value}'");

			if(!$this->db->errno)
				return $query;
			else 
				$this->getError();
		}
	}
?>