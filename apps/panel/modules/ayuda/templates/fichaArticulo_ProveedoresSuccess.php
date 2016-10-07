<?php echo __("<b>Pestaña Proveedores:</b> Mostrará todos los proveedores que suministran el artículo. Además pulsando sobre alguno de ellos, SGUM nos redireccionará a la ficha del proveedor escogido.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaArticulo_Proveedores.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaArticulo_Proveedores.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>