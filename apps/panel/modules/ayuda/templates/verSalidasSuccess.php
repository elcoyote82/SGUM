<?php echo __("En el módulo Proveedores se listarán todos los proveedores guardados en la aplicación SGUM. Además se mostrarán los datos más importantes de los mismos, como su nombre, dirección, teléfono, móvil o fax. Al igual que en las otras pantallas de listados de datos, se pueden ordenar los datos pulsando encima de las diferente columnas."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerProveedores.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerProveedores.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>