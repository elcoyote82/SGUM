<ul>
	<?php $ar_articulos_proveedor = $acc_articulos->obtenerArticulosXIdProveedor($proveedor); ?>
	<?php foreach ($ar_articulos_proveedor as $articulo1): ?>
		<?php $articulo = $acc_articulos->obtenerObjArticulo($articulo1->getIdArticulo())?>
		<?php if (strncasecmp($articulo->getNombre(),$nombre_articulo,strlen($nombre_articulo))==0): ?>
			<li style='color:black;' id="<?php echo $articulo->getIdArticulo() ?>"><?php echo $articulo->getNombre(); ?></li>
		<?php endif; ?>
	<?php endforeach; ?>
</ul>