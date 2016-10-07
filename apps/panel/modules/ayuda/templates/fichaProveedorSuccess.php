<?php echo __("La ficha del proveedor nos muestra todos los datos relativos al proveedor en diferentes pestañas, sus datos, los artículos que suministra, los últimos pedidos realizados a ese proveedor y los diferentes contactos que se tienen del proveedor.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaProveedor.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaProveedor.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Como indicábamos en el apartado de la edición del proveedor, desde la ficha disponemos de un botón para editar los datos del proveedor.")?>