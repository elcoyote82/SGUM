<?php echo __("Se listarán todos los pedidos realizados independientemente del estado en el que se encuentren."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AdministrarPedidos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AdministrarPedidos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>