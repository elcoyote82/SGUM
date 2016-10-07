<ul>
<?php foreach ($articulos as $articulo): ?>
	<?php if (strncasecmp($articulo->getNombre(),$nombre,strlen($nombre))==0): ?>
		<li id='auto'><?php echo $articulo->getNombre(); ?></li>
	<?php endif; ?>
<?php endforeach; ?>
</ul>