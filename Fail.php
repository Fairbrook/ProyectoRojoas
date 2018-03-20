
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ropa el Carlos</title>
	<link href="style/registro.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php 
		require_once "navbar.php";
	 ?>
	<div class="group">
		<form action="registro.php" method="POST">
			<h2>Registro Incompleto</h2>
			<center><input class="form-btn"  onClick="window.location.href='reg.php'" name="submit" type="button" value="Atrás" id="btnSubmit" /></center>
		</form>
	</div>
	<?php 
		require_once "footer.php";
	 ?>
</body>
</html>