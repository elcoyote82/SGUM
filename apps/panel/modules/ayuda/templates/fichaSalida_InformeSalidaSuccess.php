<?php echo __("<b>Pestaña Informe Salida:</b> Podremos visualizar el informe de salida, siempre y cuando se haya generado.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaSalida_InformeSalida.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaSalida_InformeSalida.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>