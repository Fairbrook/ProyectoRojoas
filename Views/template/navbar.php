<div id="brand">
	
	<span id="nav-button" onclick="show()">
		<span></span>
	</span>
	<h1>Ropa el carlos</h1>
</div>
<nav>
	<ul id="menu">
		<div class="izquierda">
			<li>
				<a href=<?php echo URL; ?>>Inicio</a>
			</li>
			<?php for($i=0;$i<count($cat);$i++){ ?>
			<li class="seccion">
				<a><?php echo $cat[$i]->nombre; ?></a>
				<div class="sub">
					<dl>
						<?php 
						for($j=0;$j<count($sub);$j++){ 
							if($sub[$j]->id_categoria==$cat[$i]->id){
								echo "<dd><a href=".URL."productos/categoria/{$sub[$j]->id}>{$sub[$j]->nombre}</a></dd>";
							}
						} 
						?>
					</dl>
				</div>
			</li>
			<?php } ?>
		</div>
		
		<div class="derecha">
			<li>
				<a href="<?php echo URL.DS.'contacto' ?>">Contactenos</a>
			</li>
			<li>
				<a href="reg.php">Registro</a>
			</li>
		</div>
	</ul>
</nav>