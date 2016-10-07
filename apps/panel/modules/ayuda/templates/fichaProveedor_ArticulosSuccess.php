<?php echo __("<b>Pestaña Artículos:</b> Se listarán todos los artículos que suministra el proveedor. Además si algunos de los productos listados está bajo de stock disponemos de un botón para hacer un pedido directamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaProveedor_Articulos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaProveedor_Articulos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>