<?php echo __("Se muestran todas las entradas independientemente del estado en el que se encuentren. Todas con sus diferentes acciones que se explicarán en sus respectivos apartados."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AdministrarEntradas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AdministrarEntradas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>