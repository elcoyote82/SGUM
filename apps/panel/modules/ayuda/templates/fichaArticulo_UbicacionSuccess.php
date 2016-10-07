<?php echo __("<b>Pestaña Ubicación:</b> Muestra todas las ubicaciones donde se puede localizar el artículo. Además pulsando sobre la ubicación, iremos directamente a ver la ficha de la ubicación que nos mostrará todos los artículos y el espacio libre del que dispone la misma.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaArticulo_Ubicacion.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaArticulo_Ubicacion.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>