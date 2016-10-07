<?php echo __("Para borrar una familia tenemos que buscarlo en el listado de familias y hacer clic en el botón de borrado que aparece a la derecha del listado. Un mensaje por pantalla nos preguntará si estamos seguros de borrarlo. Si aceptamos, la familia se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarFamilia.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarFamilia.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("La opción de borrar una familia sólo la puede realizar un usuario administrador. Además la familia no puede ser borrada si tiene artículos agrupados en ella.")?>