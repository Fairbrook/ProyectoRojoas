<?php namespace Models;
	class usuario extends \Core\modeloBase
	{
		private $id;
		private $nombres;
		private $apellido_p;
		private $apellido_m;
		private $direccion;
		private $correo;
		private $contrasena;

		public function __construct(){parent::__construct("usuarios");}

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

			$query = "INSERT INTO usuarios (id, nombres, apellido_m, apellido_p, direccion, correo, contrasena, time) VALUES ($this->id,'$this->nombres','$this->apellido_m','$this->apellido_p','$this->direccion','$this->correo',sha('$this->contrasena'),NOW())";
			$save = $this->db()->query($query);
			return $save;
		}

		public function update(){
			$query = "UPDATE usuarios SET nombres = '$this->nombres', apellido_p = '$this->apellido_p', apellido_m = '$this->apellido_m', direccion = '$this->direccion', correo = '$this->correo', contrasena = sha('$this->contrasena'), time = NOW() WHERE id = $this->id";
			$update = $this->db()->query($query);
			return $update;
		}

		public function delete(){
			return $this->deleteById($this->id);
		}

		public function read(){
			$read = $this->getById($this->id);
			$this->nombres = $read->nombres;
			$this->apellido_m = $read->apellido_m;
			$this->apellido_p = $read->apellido_p;
			$this->direccion = $read->direccion;
			$this->correo = $read->correo;
		}
	}
 ?>