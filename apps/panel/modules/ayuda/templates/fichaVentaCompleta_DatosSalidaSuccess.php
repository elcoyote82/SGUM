<?php echo __("<b>Pestaña Datos Salida</b>: Los datos de la salida, junto con el conductor que envió las mercancías, su empresa y los  artículos mostrando el lote y la ubicación en el almacén.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaVentaCompleta_DatosSalida.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaVentaCompleta_DatosSalida.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>