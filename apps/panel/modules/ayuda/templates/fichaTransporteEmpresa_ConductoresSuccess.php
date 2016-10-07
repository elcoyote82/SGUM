<?php echo __("<b>Pestaña Conductores:</b> Muestra un listado de los conductores que trabajan para la empresa. Además pulsando sobre ellos, SGUM nos envía a la ficha del conductor.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaTransporteEmpresa_Conductores.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaTransporteEmpresa_Conductores.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>