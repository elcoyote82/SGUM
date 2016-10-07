<?php echo __("Para editar los datos de una familia que ya ha sido creada sólo tendremos que hacer clic encima del botón Editar, y modificar los datos. Una vez hecho esto, hacemos clic en Actualizar para guardar los datos modificados.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'EditarFamilia.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/EditarFamilia.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>