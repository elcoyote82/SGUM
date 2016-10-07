<?php echo __("<b>Pestaña Proveedores:</b> Muestra los datos del cliente asignado a ese contacto.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaContacto_Cliente.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaContacto_Cliente.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>