<?php echo __("Para borrar un cliente tenemos que buscarlo en el listado de clientes y hacer clic en el botón de borrado que aparece a la derecha del artículo en cuestión. Un mensaje por pantalla nos preguntará si estamos seguros de borrarlo. Si aceptamos el cliente se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarCliente.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarCliente.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("La opción de borrar un cliente sólo la puede realizar un usuario administrador. Además el cliente no puede haber participado en ninguna operación de entrada o salida de mercancías, ya que si se elimina se pierde la trazabilidad.")?>