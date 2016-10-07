<?php echo __("La ficha del pedido nos muestra todos los datos relativos al pedido en diferentes pestañas, los datos del proveedor, los datos del pedido, los artículos solicitados junto con su cantidad y la visualización del informe de pedido.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaPedido.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaPedido.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>