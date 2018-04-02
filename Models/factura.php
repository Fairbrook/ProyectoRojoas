<?php namespace Models;
	class factura extends \Core\modeloBase
	{
		private $id;
		private $id_cliente;
		private $total;
		private $time;

		public function __construct(){parent::__construct("facturas");}

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
			$query = "INSERT INTO facturas (id, id_cliente, total, time) VALUES ($this->id, $this->id_cliente,$this->total, NOW())";
			$save = $this->db()->query($query);
			return $save;
		}

		public function update(){
			$query = "UPDATE facturas SET id_cliente = $this->id_cliente, total = '$this->total', time = NOW() WHERE id = $this->id";
			$update = $this->db()->query($query);
			return $update;
		}

		public function delete(){
			return $this->deleteById($this->id);
		}

		public function read(){
			$read = $this->getById($this->id);
			$this->id_cliente = $read->id_cliente;
			$this->total = $read->total;
			$this->time = $read->time;
		}
	}
 ?>