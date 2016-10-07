<?php echo __("<b>Pestaña Informe Venta:</b> Podremos visualizar el informe de la venta.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaSalida_InformeVenta.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaSalida_InformeVenta.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>