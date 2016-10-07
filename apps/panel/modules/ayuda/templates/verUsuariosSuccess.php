<?php echo __("Desde esta sección podremos contemplar los distintos usuarios creados en la aplicación, cada uno
 con sus datos principales como nombre, teléfono, email y el grupo al que pertenecen."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerUsuarios.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerUsuarios.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>