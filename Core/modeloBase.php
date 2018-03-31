<?php namespace Core;
	class modeloBase extends entidadBase
	{
		private $table;

		function __construct($table)
		{
			$this->table=(string) $table;
			parent::__construct($table);
		}

		public function getTable(){return $this->table;}

		public function getNextId(){
			$query = "SELECT max(id) as 'max_id' FROM $this->table";
			$result = $this->db()->query($query);
			$result = $result->fetch_assoc();
			return $result['max_id'] + 1;
		}

		public function ejecutarSql($query){
			$query = $this->db->real_escape_string($query);
			$query = $this->db->query($query);
			if ($query==true) {
				if ($query->num_rows>1) {
					while ($row = $query->fetch_object()) {
						$result=$row;
					}
				}else if ($query->num_rows==1) {
					if ($row=$query->fetch_object()) {
						$result=$row;
					}
				}else{
					$result = true;
				}
			}else{
				$result=false;
			}
			return $result;
		}
	}
?>