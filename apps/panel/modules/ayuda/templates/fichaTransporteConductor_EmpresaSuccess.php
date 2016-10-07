<?php echo __("<b>Pestaña Empresa:</b> Muestra los datos de la empresa en la que está trabajando el conductor.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaTransporteConductor_Empresa.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaTransporteConductor_Empresa.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>