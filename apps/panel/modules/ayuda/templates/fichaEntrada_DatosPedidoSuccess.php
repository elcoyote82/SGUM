<?php echo __("<b>Pestaña Datos Pedido:</b> Los datos del pedido, junto con el proveedor y los artículos solicitados con la cantidad solicitada.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaEntrada_DatosPedido.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaEntrada_DatosPedido.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>