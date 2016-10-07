<?php echo __("Para borrar un artículo tenemos que buscarlo en el listado de artículos y hacer clic en el botón de borrado que aparece a la derecha del artículo en cuestión. Un mensaje por pantalla nos preguntará si estamos seguros de borrarlo. Si aceptamos el artículo se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarArticulo.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarArticulo.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("La opción de borrar un artículo sólo la puede realizar un usuario administrador. Además el artículo no puede haber participado en ninguna operación de entrada o salida, ya que si se elimina se pierde la trazabilidad.")?>