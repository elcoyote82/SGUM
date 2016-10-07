<?php echo __("Desde esta sección podremos contemplar los distintos conductores creados en la aplicación, cada uno con sus datos principales como nombre y apellidos, teléfono, móvil y la empresa a la que pertenecen."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerTransporteConductores.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerTransporteConductores.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>