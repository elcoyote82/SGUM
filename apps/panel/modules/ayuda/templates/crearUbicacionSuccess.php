<?php echo __("Podremos agregar una nueva ubicación al sistema, para ello sólo debemos seguir el sistema establecida y rellenar el formulario. Guardamos y ya tenemos nuestra nueva ubicación en SGUM.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CrearUbicacion.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CrearUbicacion.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>