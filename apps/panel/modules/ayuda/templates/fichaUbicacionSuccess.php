<?php echo __("La ficha de la ubicación nos muestra la capacidad de la estantería, además de mostrar un listado con todos los productos almacenados en ella y su Lote. Pulsando en los diferentes artículos, y como comentábamos en el apartado de Artículos, se enlazará directamente a la ficha del artículo.	 ")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaUbicacion.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaUbicacion.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>