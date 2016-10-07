<?php echo __("<b>Pestaña Proveedor:</b> Muestra los datos del proveedor asignado a ese contacto.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaContacto_Proveedor.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaContacto_Proveedor.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>