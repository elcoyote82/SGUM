<?php echo __("Para agregar un nuevo permiso simplemente tendremos que hacer clic en Crear Permiso y rellenar el 
		formulario que aparece con los datos que luego se almacenarán en la Base de Datos.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CrearPermiso.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CrearPermiso.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>