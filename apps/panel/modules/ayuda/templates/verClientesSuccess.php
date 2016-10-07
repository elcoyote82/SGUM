<?php echo __("En el módulo Clientes se listarán todos los clientes guardados en la aplicación SGUM. Además se mostrarán los datos más importantes de los mismos, como su nombre, dirección, teléfono, móvil o fax. Al igual que en las otras pantallas de listados de datos, se pueden ordenar los datos pulsando encima de las diferente columnas."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerClientes.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerClientes.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Indicar que podemos ordenar alfabéticamente las diferentes columnas pulsando sobre ellas."); ?>