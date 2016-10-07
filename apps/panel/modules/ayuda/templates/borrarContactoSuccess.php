<?php echo __("Para borrar un contacto tenemos que buscarlo en el listado de contactos y hacer clic en el botón de borrado que aparece a la derecha del contacto en cuestión. Un mensaje por pantalla nos preguntará si estamos seguros de borrarlo. Si aceptamos el contacto se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarContacto.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarContacto.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("La opción de borrar un contacto sólo la puede realizar un usuario administrador. Además el contacto no puede ser jefe de ningún otro contacto para poder ser eliminado.")?>