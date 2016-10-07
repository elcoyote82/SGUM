<ul>
<?php foreach ($articulos as $articulo): ?>
	<?php if (strncasecmp($articulo->getNombre(),$nombre_articulo,strlen($nombre_articulo))==0): ?>
		<li style='color:black;' id="<?php echo $articulo->getIdArticulo() ?>"><?php echo $articulo->getNombre(); ?></li>
	<?php endif; ?>
<?php endforeach; ?>
</ul>