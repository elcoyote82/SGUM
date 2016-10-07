<?php echo __("<b>Pestaña Informe Pedido:</b> Podremos visualizar el informe de pedido.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaPedidoCompleto_InformePedido.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaPedidoCompleto_InformePedido.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>