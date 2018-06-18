<?php 
	require_once "Config/config.php";
	require_once "Config/autoload.php";

	define('ROOT', realpath(dirname(__FILE__)) . DS);

	$directorio = str_replace("index.php", "", $_SERVER['PHP_SELF']);
	$directorio = str_replace("/", DS, $directorio);
	$ruta = "http:".DS.DS.$_SERVER['HTTP_HOST'].$directorio;
	
	define('URL', $ruta);
	define('CSS', $ruta."css".DS);
	define('JS', $ruta."js".DS);
	define('IMG', $ruta."img".DS);
	define('VIEW', $ruta."Views".DS);

	Config\autoload::load();
	if(!strpos($_GET["url"],"pdf")&&!strpos($_GET["url"],"xml"))
	require_once "Views/template/template.php";
	Config\enrutador::run(new Config\request());
 ?>