<?php echo __("Para editar los datos de un proveedor que ya ha sido creado sólo tendremos que hacer clic encima del botón Editar, y modificar los datos que nos interesen. Una vez hecho esto, hacemos clic en Actualizar para guardar los datos modificados. También disponemos de la posibilidad de editar desde la ficha del proveedor.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'EditarProveedor.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/EditarProveedor.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>