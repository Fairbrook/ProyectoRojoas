<?php namespace Config;

	class request
	{
		private $controlador;
		private $metodo;
		private $argumento;
		
		public function __construct()
		{
			if(isset($_GET['url'])){
				$ruta = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
				$ruta = explode("/", $ruta);
				$ruta = array_filter($ruta);

				$this->controlador = strtolower(array_shift($ruta));

				$this->metodo = strtolower(array_shift($ruta));
				if (!$this->metodo) {
					$this->metodo= (string)ACCION_DEFECTO;
				}
				$this->argumento = $ruta;
			}else{
				$this->controlador = CONTROLADOR_DEFECTO;
				$this->metodo = ACCION_DEFECTO;
			}
		}

		public function getControlador(){return $this->controlador;}
		public function getMetodo(){return $this->metodo;}
		public function getArgumento(){return $this->argumento;}
	}
 ?>