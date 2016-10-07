<?php echo __("Para borrar una ubicación hay que ser administrador y no tener ningún artículo almacenado en ella. Como siempre tenemos que buscar el botón de borrado que aparece a la derecha de la ubicación. Un mensaje por pantalla nos preguntará si estamos seguros de borrarla. Si aceptamos la ubicación se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarUbicacion.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarUbicacion.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>