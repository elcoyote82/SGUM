<?php echo __("<b>Pestaña Datos Entrada:</b> Los datos de la entrada, junto con el conductor que entregó las mercancías, su empresa y los  artículos mostrando el lote y la ubicación en el almacén.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaPedidoCompleto_DatosEntrada.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaPedidoCompleto_DatosEntrada.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>