<?php namespace Views;
	
	use \Models\categoria as categoria;
	use \Models\sub_categoria as sub_categoria;

	class template
	{
		
		function __construct()
		{
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Ropa el carlos</title>
		<link rel="stylesheet" href="<?php echo CSS;?>global.css">
		<script src="<?php echo JS; ?>jquery-3.2.1.js"></script>
		<script src="<?php echo JS; ?>navbar.js"></script>
		<script src="<?php echo URL; ?>font-awesome\js\fontawesome-all.min.js"></script>
	</head>
	<body>
	
<?php	
		$categorias = new categoria();
		$cat = $categorias->getAll();

		$categorias->db()->close();
		unset($categorias);

		$sub_categorias = new sub_categoria();
		$sub = $sub_categorias->getAll();

		$sub_categorias->db()->close();
		unset($sub_categorias);

		require_once "navbar.php";
		}
		
		function __destruct()
		{
		require_once "footer.php";
?>
	</body>
	</html>		
<?php	}
	}

	$template = new template();
 ?>