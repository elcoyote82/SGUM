<?php echo __("La ficha de la venta cuando dispone de todos los artículos o está procesada tiene un mayor número de pestañas. En este caso además de los datos de la venta, cliente y el informe de la venta se añaden los datos de la salida, con los artículos mostrando el lote y ubicación en el almacén y la visualización del informe de salida.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaVentaCompleta.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaVentaCompleta.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>