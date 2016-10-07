<?php echo __("<b>Pestaña Contactos:</b> Además de los datos del proveedor, la aplicación SGUM nos permite agregar diferentes contactos a un proveedor. En el módulo Contactos explicaremos con más detalle cómo hacerlo, pero en esta pestaña se mostrarán los contactos que tiene un proveedor, mostrando algunos de sus datos. Además pulsando sobre alguno de ellos, SGUM nos redireccionará a la ficha del contacto escogido.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaProveedor_Contactos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaProveedor_Contactos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>