<?php namespace Models;
	class sub_categoria extends \Core\modeloBase
	{
		private $id;
		private $nombre;
		private $descript;
		private $id_categoria;

		public function __construct(){parent::__construct("sub_categorias");}

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
			$query = "INSERT INTO sub_categorias (id, nombre, descript, id_categoria) VALUES ({$this->id}, '{$this->nombre}','{$this->descript}',{$this->id_categoria})";
			$save = $this->db()->query($query);
			return $save;
		}

		public function update(){
			$query = "UPDATE sub_categorias SET nombre = '$this->nombre', descript = '$this->descript', id_categoria = $this->id_categoria WHERE id = $this->id";
			$update = $this->db()->query($query);
			return $update;
		}

		public function delete(){
			return $this->deleteById($this->id);
		}

		public function read(){
			$read = $this->getById($this->id);
			$this->nombre = $read->nombre;
			$this->descript = $read->descript;
			$this->id_categoria = $read->id_categoria;
		}
	}
 ?>