<?php echo __("Los diferentes artículos se agrupan en familias. En el módulo de Artículos, tenemos acceso esta sección, donde se listarán las diferentes familias en las que se pueden agrupar los productos del almacén. ")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'verFamilias.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/verFamilias.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Indicar que podemos ordenar alfabéticamente las familias pulsando sobre la columna del nombre.")?>