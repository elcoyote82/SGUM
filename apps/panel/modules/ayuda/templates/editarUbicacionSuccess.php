<?php echo __("Como siempre, para la edición pulsamos sobre el botón Editar, y modificamos el nombre de la ubicación. Una vez hecho esto, hacemos clic en Actualizar para guardar los datos modificados.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'EditarUbicacion.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/EditarUbicacion.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Las ubicaciones al ir colocando la mercancía irán aumentando el espacio ocupado. Desde la ficha de la ubicación podemos observar mediante una gráfica la capacidad de la que dispone cada ubicación. Para actualizar esta capacidad se puede hacer desde la edición de la ubicación.")?>