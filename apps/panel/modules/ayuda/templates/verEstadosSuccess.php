<?php echo __("Desde la pantalla principal podremos consultar todos los estados, además de poder editarlos 
		o borrarlos."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerEstados.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerEstados.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>