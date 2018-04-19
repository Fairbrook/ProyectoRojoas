<?php namespace Models;
	class venta extends \Core\modeloBase
	{
		private $id;
		private $id_fac;
		private $id_producto;
		private $subtotal;
		private $cantidad;

		public function __construct(){parent::__construct("ventas");}

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

			$query = "INSERT INTO ventas (id, id_fac, id_producto, subtotal, cantidad) VALUES ($this->id,$this->fac, $this->id_producto,$this->subtotal,$this->cantidad)";
			$save = $this->db()->query($query);
			return $save;
		}

		public function update(){
			$query = "UPDATE ventas SET id_fac = $this->id_fac, id_producto = $this->id_producto, subtotal = $this->subtotal, cantidad = $this->cantidad WHERE id = $this->id";
			$update = $this->db()->query($query);
			return $update;
		}

		public function delete(){
			return $this->deleteById($this->id);
		}

		public function read(){
			$read = $this->getById($this->id);
			$this->id_fac = $read->id_fac;
			$this->id_producto = $read->id_producto;
			$this->subtotal = $read->subtotal;
			$this->cantidad = $read->cantidad;
		}
	}
 ?>