<?php namespace Models;
	class factura extends \Core\modeloBase
	{
		private $id;
		private $id_cliente;
		private $total;
		private $pedido;
		private $entrega;
		private $estado;

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
			if(!$this->id)$this->id=$this->getNextId();
			$query = "INSERT INTO facturas (id, id_cliente, total, pedido, entrega, estado)
			 VALUES (
					$this->id, 
					$this->id_cliente,
					$this->total, 
				 	NOW(),
					'{$this->fecha()}',
					1
				 )";
			$save = $this->db()->query($query);
			return $save;
		}

		public function update(){
			$query = "UPDATE facturas SET 
					id_cliente = $this->id_cliente, 
					total = $this->total, 
					pedido = '$this->pedido',
					entrega = '$this->entrega',
					estado = $this->estado
					WHERE id = $this->id";
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
			$this->pedido = $read->pedido;
			$this->entrega = $read->entrega;
			$this->estado = $read->estado;
		}

		public function fecha(){
			$date = date("Y-m-d"); 
			$date_det = explode("-",$date);
			$cont=0;
			while($cont!=3){
				$jd = gregoriantojd($date_det[1],$date_det[2],$date_det[0]);
				$day = jddayofweek($jd,0);
				if($day!=6 && $day!=0)$cont++;
				$date_det[2]++;
			}
			return date("Y-m-d", mktime(0,0,0,$date_det[1],$date_det[2],$date_det[0]));
		}

		public function getByUsuario($id){
		$query = $this->db()->query("SELECT * FROM {$this->table} WHERE id_cliente={$id}");

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