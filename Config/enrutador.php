<?php namespace Config;

	class enrutador{
		private function error(){
			$controlador = CONTROLADOR_ERROR. "Controller";
			$ruta = ROOT."Controllers".DS.$controlador.".php";
			require_once $ruta;
			$mostrar = "Controllers\\". $controlador;
			$controlador = new $mostrar;	
			call_user_func(array($controlador,ACCION_DEFECTO));
		}

		public static function run(Request $request){
			$controlador = $request->getControlador()."Controller";
			$ruta = ROOT . "Controllers" . DS .$controlador . ".php";
			$metodo = $request->getMetodo();
			$argumento = $request->getArgumento();
			if (is_file($ruta)) {
				require_once $ruta;
				$mostrar = "Controllers\\".$controlador;
				$controlador = new $mostrar;
				if (!isset($argumento)) {
					if (is_callable(array($controlador,$metodo))) {
						call_user_func(array($controlador, $metodo));
					}else self::error();

				}else{
					if (is_callable(array($controlador,$metodo))) {
						call_user_func_array(array($controlador, $metodo),$argumento);
					}else self::error();
				}
			}else echo self::error();
		}
	}
 ?>