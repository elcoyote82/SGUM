<ul>
	<?php foreach ($ar_articulos as $articulo): ?>
		<?php $obj_articulo = $acc_articulos->obtenerObjArticulo($articulo->getIdArticulo());?>
		<?php if (strncasecmp($obj_articulo->getNombre(),$nombre_articulo,strlen($nombre_articulo))==0): ?>
			<li style='color:black;' id="<?php echo $obj_articulo->getIdArticulo() ?>"><?php echo $obj_articulo->getNombre(); ?></li>
		<?php endif; ?>
	<?php endforeach; ?>
</ul>