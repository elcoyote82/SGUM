<?php echo __("Se listarán todas las ventas realizadas independientemente del estado en el que se encuentren. Los diferentes estados disponen de distintas acciones que se explicarán en sus respectivos apartados."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AdministrarVentas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AdministrarVentas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>