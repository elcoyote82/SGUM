<?php echo __("Se muestran todas las salidas independientemente del estado en el que se encuentren. Todas con sus diferentes acciones que se explicarán en sus respectivos apartados."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AdministrarSalidas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AdministrarSalidas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>