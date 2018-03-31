<?php include "carrusel.php";?>

<div class="grid">
	<?php for ($i=0; $i < count($productos); $i++) { ?>
	<article>
		<a href=<?php echo URL."productos".DS."ver".DS.$productos[$i]->id?>>
			<div class="img">
				<img src="<?php echo IMG.$productos[$i]->imagen; ?>" alt="">
			</div>
		</a>
	</article>
	<?php } ?>
</div>