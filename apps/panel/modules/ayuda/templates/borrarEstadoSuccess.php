<?php echo __("Para borrar un estado sólo tenemos que buscarlo y hacer clic en el botón de borrado que aparece 
		a la derecha del estado en cuestión. Un mensaje por pantalla nos preguntará si estamos seguros de
		borrarlo. Si aceptamos el estado se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarEstado.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarEstado.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Si el estado se encuentra en uso, no es posible borrarlo.")?>