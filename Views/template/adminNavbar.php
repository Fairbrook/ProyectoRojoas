 <script src="<?php echo JS;?>cookie.js"></script>
<script src="<?php echo JS;?>popup.js"></script>

<div id="brand">
	<span id="nav-button" onclick="show()">
		<span></span>
	</span>
	<h1>Ropa el carlos</h1>
</div>
<nav>	
	<ul id	="menu">	
		<div class="izquierda">	
			<li>
				<a href=" <?php echo URL.'admin' ?> ">Ver productos</a>
			</li>
			<li>
				<a href="<?php echo URL.'admin'.DS.'add' ?>">Añadir producto</a>
			</li>
			<li>	
				<a href=" <?php echo URL.'admin'.DS.'addCat' ?> ">Añadir categorias</a>
			</li>
		</div>
		<div class="derecha">	
			<li>	
				<a>Bienvenido adminstrador</a>
			</li>
			<li>	
				<a href="<?php echo URL.'logout'; ?>">Salir</a>
			</li>
		</div>
	</ul>
</nav>