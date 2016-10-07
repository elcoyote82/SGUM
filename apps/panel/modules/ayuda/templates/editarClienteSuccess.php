<?php echo __("Para editar los datos de un cliente que ya ha sido creado sólo tendremos que hacer clic encima del botón Editar, y modificar los datos que nos interesen. Una vez hecho esto, hacemos clic en Actualizar para guardar los datos modificados. También disponemos de la posibilidad de editar desde la ficha del cliente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'EditarCliente.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/EditarCliente.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>