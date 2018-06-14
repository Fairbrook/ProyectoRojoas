<script src="<?php echo JS;?>cookie.js"></script>
<script src="<?php echo JS;?>popup.js"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<div id="google_translate_element"></div>
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
				<a href=<?php echo URL;?>>Inicio</a>
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
				<a href="<?php echo URL.'contacto' ?>">Contactenos</a>
			</li>
			<?php 
				if (isset($_SESSION['nombres'])) {
					echo "<li><a href='".URL."factura'>Bienvenido $_SESSION[nombres]</a></li>";
					echo "<li><a href='".URL."logout'>Salir</a></li>";
				}else{
			?>
			<li>
				<a href="<?php echo URL.'registro' ?>">Registrate</a>
			</li>
			<li>
					<a href="<?php echo URL.'login'?>">Entrar</a>	
			</li>
			<?php } ?>	
			<li>
				<a href="<?php echo URL;?>carrito"><span class="fas fa-shopping-cart"></span></a>
				
			</li>
		</div>
	</ul>
</nav>


<div class = "pop-up">
	<div class = "title">Seleccione un idioma</div>
	<div class="flex-row">
		<div class="button" id="ing" style="cursor:pointer;">Ingles</div>
		<div class="button" id="esp" style="cursor:pointer;">Español</div>
	</div>
</div>