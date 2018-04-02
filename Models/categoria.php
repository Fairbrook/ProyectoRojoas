<?php namespace Models;
	class categoria extends \Core\modeloBase
	{
		private $id;
		private $nombre;

		public function __construct(){parent::__construct("categorias");}

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
			$query = "INSERT INTO categorias (id, nombre) VALUES ($this->id,'$this->nombre')";
			$save = $this->db()->query($query);
			return $save;
		}

		public function update(){
			$query = "UPDATE categorias SET nombre = '$this->nombre' WHERE id = $this->id";
			$update = $this->db()->query($query);
			return $update;
		}

		public function delete(){
			return $this->deleteById($this->id);
		}

		public function read(){
			$read = $this->getById($this->id);
			$this->nombre = $read->nombre;
		}
	}
 ?>