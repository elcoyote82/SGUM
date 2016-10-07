<p><?php echo __("Otra de las opciones configurables que ofrece la aplicación SGUM es poder modificar la numeración de los informes que se generan en los pedidos, entradas, ventas o salidas.")?></p>
<p><?php echo __("Por defecto las numeraciones vienen establecidas con el valor AAA, pero en cualquier momento se puede modificar en cada campo, cambiando el valor y pulsando en el botón Actualizar.")?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'ConfigurarNumeracion.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/ConfigurarNumeracion.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>