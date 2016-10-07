<?php echo __("Podremos crear un usuario desde la administración haciendo clic en Crear Usuario y rellenando los 
		datos solicitados en el formulario, los cuales se almacenarán en la Base de Datos.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CrearUsuario.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CrearUsuario.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>