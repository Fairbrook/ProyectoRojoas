<?php namespace Models;
	class descuento extends \Core\modeloBase{
		private $id;
		private $descuento;
		private $cantidad;
		private $id_producto;

		public function __construct(){
			parent::__construct("descuentos");
		}
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
			$query = "INSERT INTO {$this->table} (id, descuento, cantidad, id_producto) values ({$this->id},{$this->descuento},{$this->cantidad},{$this->id_producto})";
			$this->db()->query($query);
		}
		public function update(){
			$query = "UPDATE {$this->table} SET
						descuento={$this->descuento},
						cantidad={$this->cantidad},
						id_producto={$this->id_producto}
						WHERE id = {$this->id}";
			$this->db()->query($query);
		}
		public function delete(){
			return $this->deleteById($this->id);
		}
		public function read(){
			$read = $this->getById($this->id);
			$this->descuento = $read->descuento;
			$this->cantidad = $read->cantidad;
			$this->id_producto = $read->id_producto;
		}

		public function getByProducto($id){
		$query = $this->db()->query("SELECT * FROM {$this->table} where id_producto = {$id}");

			if(!$this->db()->errno){
				$result = array();
				if ($query->num_rows > 0) {
					while ($row=$query->fetch_object()) {
						$result[]=$row;
					}
				}
				return $result;

			}else 
				$this->getError();
		}
	}

 ?>