<?php echo __("La ficha del conductor nos muestra todos los datos relativos al conductor de una manera individual. En otra pestaña nos muestra la empresa a la que pertenece y los datos de la misma.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaTransporteConductor.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaTransporteConductor.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Como indicábamos en el apartado de la edición del conductor, desde la ficha disponemos de un botón para editar los datos del mismo.")?>