<?php echo __("Para borrar un proveedor tenemos que buscarlo en el listado de proveedor y hacer clic en el botón de borrado que aparece a la derecha del artículo en cuestión. Un mensaje por pantalla nos preguntará si estamos seguros de borrarlo. Si aceptamos el proveedor se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarProveedor.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarProveedor.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("La opción de borrar un proveedor sólo la puede realizar un usuario administrador. Además el proveedor no puede haber participado en ninguna operación de entrada o salida de mercancías, ya que si se elimina se pierde la trazabilidad.")?>