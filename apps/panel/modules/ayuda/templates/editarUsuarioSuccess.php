<?php echo __("Para editar los datos de un usuario que ya ha sido creado sólo tendremos que hacer clic encima 
		del nombre de usuario o en el botón Editar, y modificar los datos que nos interesen. Una vez hecho esto, 
		hacemos clic en Actualizar para guardar los datos modificados.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'EditarUsuario.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/EditarUsuario.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>