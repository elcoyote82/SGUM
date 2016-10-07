<?php echo __("<b>Pestaña Contactos:</b> Además de los datos del cliente, la aplicación SGUM nos permite agregar diferentes contactos a un cliente. En el módulo Contactos explicaremos con más detalle cómo hacerlo, pero en esta pestaña se mostrarán los contactos que tiene un cliente, mostrando algunos de sus datos. Además pulsando sobre alguno de ellos, SGUM nos redireccionará a la ficha del contacto escogido.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaCliente_Contactos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaCliente_Contactos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>