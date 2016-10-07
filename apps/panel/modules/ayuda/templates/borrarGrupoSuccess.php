<?php echo __("Para borrar un grupo sólo tenemos que buscarlo desde el listado de grupos y hacer clic en el botón 
		de borrado que aparece a la derecha del grupo en cuestión. Un mensaje por pantalla nos preguntará si 
		estamos seguros de borrarlo. Si aceptamos el grupo se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarGrupo.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarGrupo.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Si el grupo dispone de usuarios asignados, no es posible borrar el grupo.")?>