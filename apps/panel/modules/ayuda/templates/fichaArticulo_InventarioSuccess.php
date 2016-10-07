<?php echo __("<b>Pestaña Inventario:</b> Si el producto está bajo de stock disponemos de un botón para hacer un pedido directamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaArticulo_Inventario.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaArticulo_Inventario.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>