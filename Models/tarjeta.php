<?php namespace Models;
	class tarjeta extends \Core\modeloBase
	{
		private $id;
		private $numero;
		private $month;
		private $year;
		private $id_usuario;
		private $cod_seg;

		public function __construct(){parent::__construct("tarjetas");}

		public function getId(){
			return $this->id;
		}
		public function get($atributo){
			return $this->{$atributo};
		}

		public function set($atributo,$value){
			$this->{$atributo} = $value;
		}

		public function save(){
			if(!$this->id)$this->id=$this->getNextId();

			$query = 
			"INSERT INTO tarjetas
			(
				id, 
				numero, 
				month,
				year, 
				id_usuario, 
				cod_seg
			) 
			VALUES
			(
				$this->id,
				$this->numero, 
				$this->month,
				$this->year,
				$this->id_usuario,
				$this->cod_seg
			)";
			$save = $this->db()->query($query);
			return $save;
		}

		public function update(){
			$query = "UPDATE tarjetas SET 
				numero = $this->numero, 
				month = $this->month,
				year = $this->year,
				id_usuario = $this->id_usuario, 
				cod_seg = $this->cod_seg 
				WHERE id = $this->id";
			$update = $this->db()->query($query);
			return $update;
		}

		public function delete(){
			return $this->deleteById($this->id);
		}

		public function read(){
			$read = $this->getById($this->id);
			$this->month = $read->month;
			$this->year = $read->month;
			$this->an = $read->an;
			$this->id_usuario = $read->id_usuario;
			$this->cod_seg = $read->cod_seg;
		}
	}
 ?>