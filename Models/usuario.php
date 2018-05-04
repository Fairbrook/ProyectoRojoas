<?php namespace Models;
	class usuario extends \Core\modeloBase
	{
		private $id;
		private $username;
		private $nombres;
		private $apellido_p;
		private $apellido_m;
		private $direccion;
		private $correo;
		private $contrasena;
		private $fecha_nac;
		private $type;

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

			$query = "INSERT INTO usuarios (id, username, nombres, apellido_m, apellido_p, direccion, correo, contrasena, fecha_nac, type, time) VALUES ($this->id,'$this->username','$this->nombres','$this->apellido_m','$this->apellido_p','$this->direccion','$this->correo',sha('$this->contrasena'),
			'$this->fecha_nac',
			$this->type ,NOW())";
			$save = $this->db()->query($query);
			return $save;
		}

		public function update(){
			$query = "UPDATE usuarios SET username='$this->username',
			nombres = '$this->nombres',
			apellido_p = '$this->apellido_p',
			apellido_m = '$this->apellido_m',
			direccion = '$this->direccion',
			correo = '$this->correo',
			contrasena = sha('$this->contrasena'),
			tipo = $this->type,
			time = NOW()
			WHERE id = $this->id";
			$update = $this->db()->query($query);
			return $update;
		}

		public function delete(){
			return $this->deleteById($this->id);
		}

		public function read(){
			$read = $this->getById($this->id);
			$this->username = $read->username;
			$this->type = $read->type;
			$this->nombres = $read->nombres;
			$this->apellido_m = $read->apellido_m;
			$this->apellido_p = $read->apellido_p;
			$this->direccion = $read->direccion;
			$this->correo = $read->correo;
		}

		public function login(){
			$query = "SELECT * FROM usuarios WHERE username='$this->username' and contrasena=sha('$this->contrasena')";
			$usuario = $this->db()->query($query);
			if($usuario->num_rows==1)$result = $usuario->fetch_object();
			if(isset($result->id))return $result->id;
			else return -1;
		}
	}
 ?>