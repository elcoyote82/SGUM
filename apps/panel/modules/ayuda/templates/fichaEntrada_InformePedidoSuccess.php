<?php echo __("<b>Pestaña Informe Pedido:</b> Podremos visualizar el informe del pedido.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaEntrada_InformePedido.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaEntrada_InformePedido.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>