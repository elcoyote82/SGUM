<?php echo __("Pestaña Datos Venta: Los datos de la venta al cliente, junto con el cliente y los artículos vendidos con la cantidad acordada.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaSalida_DatosVenta.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaSalida_DatosVenta.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>