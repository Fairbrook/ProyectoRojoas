<?php namespace Core;
	class controladorBase{
		public function view($vista,$datos=array(),$metodo=ACCION_DEFECTO){
			foreach ($datos as $key => $value) {
				${$key}=$value;
			}

			$ruta = ROOT. 'Views' . DS . $vista . DS . $metodo .'.php';
			if(is_file($ruta)){
				require_once $ruta;
			}
		}
	}
 ?>