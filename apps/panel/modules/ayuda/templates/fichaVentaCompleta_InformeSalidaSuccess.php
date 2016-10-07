<?php echo __("<b>Pestaña Informe Salida</b>: Podremos visualizar el informe de salida.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaVentaCompleta_InformeSalida.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaVentaCompleta_InformeSalida.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>