<?php echo __("<b>Pestaña Informe Entrada:</b> Podremos visualizar el informe de entrada, siempre y cuando se haya generado.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaEntrada_InformeEntrada.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaEntrada_InformeEntrada.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>