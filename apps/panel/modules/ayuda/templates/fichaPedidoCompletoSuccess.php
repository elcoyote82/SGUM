<?php echo __("La ficha del pedido aumenta su número de pestañas cuando el pedido está completo y procesado. En este caso además de los datos del pedido, proveedor y el informe de pedido se añaden los datos de la entrada, con los artículos mostrando el lote y ubicación en el almacén y la visualización del informe de entrada.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaPedidoCompleto.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaPedidoCompleto.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>