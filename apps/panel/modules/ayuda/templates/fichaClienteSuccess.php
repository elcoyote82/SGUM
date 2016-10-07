<?php echo __("La ficha del cliente nos muestra todos los datos relativos al cliente en diferentes pestañas, sus datos, las últimas ventas realizadas a ese cliente y los diferentes contactos que se tienen del cliente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaCliente.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaCliente.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Como indicábamos en el apartado de la edición del cliente, desde la ficha disponemos de un botón para editar los datos del cliente.")?>