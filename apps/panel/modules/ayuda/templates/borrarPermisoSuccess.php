<?php echo __("Para borrar un permiso sólo tenemos que buscarlo desde el listado de permisos y hacer clic en el 
		botón de borrado que aparece a la derecha del permiso en cuestión. Un mensaje por pantalla nos preguntará 
		si estamos seguros de borrarlo. Si aceptamos el permiso se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarPermiso.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarPermiso.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Si el permiso dispone de usuarios o grupos asignados, no es posible borrar el permiso.")?>