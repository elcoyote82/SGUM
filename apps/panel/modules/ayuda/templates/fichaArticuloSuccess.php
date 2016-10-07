<?php echo __("La ficha del artículo nos muestra todos los datos relativos al producto en diferentes pestañas, sus características, stock del producto, las diferentes ubicaciones que puede tener en el almacén y por último los proveedores que suministran el artículo.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaArticulo.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaArticulo.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Como indicábamos en el apartado de la edición del artículo, desde la ficha disponemos de un botón para editar los datos del producto.")?>