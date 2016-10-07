<?php echo __("La ficha del contacto nos muestra todos los datos relativos al contacto en dos pestañas, una con sus datos y la otra con los datos del Proveedor o del Cliente al que está asignado.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaContacto.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaContacto.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Como indicábamos en el apartado de la edición del contacto, desde la ficha disponemos de un botón para editar los datos del contacto.")?>