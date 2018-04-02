<?php namespace Models;
	class tarjeta extends \Core\modeloBase
	{
		private $id;
		private $numero;
		private $mes;
		private $an;
		private $id_usuario;
		private $cod_seg;
		private $titular;

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
			if(!$this->id)$this->id=$this->getNextId():

			$query = "INSERT INTO tarjetas (id, numero, mes, an, id_usuario, cod_seg, titular) VALUES ($this->id,$this->numero, $this->mes,$this->an,$this->id_usuario,$this->cod_seg, '$this->titular')";
			$save = $this->db()->query($query);
			return $save;
		}

		public function update(){
			$query = "UPDATE tarjetas SET numero = $this->numero, mes = $this->mes, an = $this->an, id_usuario = $this->id_usuario, cod_seg = $this->cod_seg, titular = '$this->titular' WHERE id = $this->id";
			$update = $this->db()->query($query);
			return $update;
		}

		public function delete(){
			return $this->deleteById($this->id);
		}

		public function read(){
			$read = $this->getById($this->id);
			$this->numero = $read->numero;
			$this->mes = $read->mes;
			$this->an = $read->an;
			$this->id_usuario = $read->id_usuario;
			$this->cod_seg = $read->cod_seg;
			$this->titular = $read->titular;
		}
	}
 ?>