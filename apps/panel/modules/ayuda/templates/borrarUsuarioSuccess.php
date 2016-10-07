<?php echo __("Para borrar un usuario tenemos que buscarlo en el listado de usuarios y hacer clic en el botón 
	de borrado que aparece a la derecha del usuario en cuestión. Un mensaje por pantalla nos preguntará si 
	estamos seguros de borrarlo. Si aceptamos el usuario se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarUsuario.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarUsuario.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>