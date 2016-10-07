<?php echo __("La ficha de la venta nos muestra todos los datos relativos a la venta en diferentes pestañas, los datos del cliente, los datos de la venta, los artículos vendidos junto con su cantidad y la visualización del informe de venta.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaVenta.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaVenta.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>