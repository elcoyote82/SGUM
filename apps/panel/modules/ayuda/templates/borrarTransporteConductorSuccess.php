<?php echo __("Para borrar un conductor tenemos que buscarlo en el listado de conductores y hacer clic en el botón de borrado que aparece a la derecha del conductor en cuestión. Un mensaje por pantalla nos preguntará si estamos seguros de borrarlo. Si aceptamos el conductor se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarTransporteConductor.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarTransporteConductor.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("La opción de borrar un conductor sólo la puede realizar un usuario administrador. Además el conductor no puede haber intervenido en ninguna entrada osa lida de mercancías para poder ser eliminado."); ?>