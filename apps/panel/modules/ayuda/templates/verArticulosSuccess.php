<?php echo __("Desde esta sección podremos contemplar los distintos artículos disponibles en el almacén, cada uno 
		con sus datos principales como nombre, familia, descripción, stock, ubicaciones donde se encuentra y los 
		proveedores que lo suministran."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerArticulos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerArticulos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Indicar que podemos ordenar alfabéticamente las diferentes columnas pulsando sobre ellas."); ?>