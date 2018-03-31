<?php namespace Models;
	class producto extends \Core\modeloBase
	{
		private $id;
		private $nombre;
		private $cantidad;
		private $precio;
		private $descripcion;
		private $imagen;
		private $id_categoria;

		public function __construct(){parent::__construct("productos");}

		public function getId(){
			return $this->id;
		}
		public function get($atributo){return $this->atributo;}
		public function set($atributo,$value){$this->atributo = $value;}

		public function save(){
			if(!$this->id)$this->id=$this->getNextId();

			$query = "INSERT INTO productos (id, nombre, cantidad, precio, descripcion, imagen, id_categoria) VALUES ($this->id, '$this->nombre', $this->cantidad ,$this->precio, '$this->descripcion' , '$this->imagen' , $this->id_categoria)";
			$save = $this->db()->query($query);
			return $save;
		}

		public function update(){
			$query = "UPDATE productos SET nombre = '$this->nombre', cantidad = $this->cantidad, precio = $this->precio, descripcion = $this->descripcion, imagen = '$this->imagen', id_categoria = $this->id_categoria WHERE id = $this->id";
			$update = $this->db()->query($query);
			return $update;
		}

		public function delete(){
			return $this->deleteById($this->id);
		}

		public function read(){
			$read = $this->getById($this->id);
			$this->nombre = $read->nombre;
			$this->cantidad = $read->cantidad;
			$this->precio = $read->precio;
			$this->descripcion = $read->descripcion;
			$this->imagen = $read->imagen;
			$this->id_categoria = $read->id_categoria;
		}
	}
 ?>