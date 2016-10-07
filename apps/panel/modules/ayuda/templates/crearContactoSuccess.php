<?php echo __("Dentro de los módulos Proveedores y Clientes, podemos agregar un contacto. Pero también desde los listados de Contactos Proveedores y Contactos Clientes se nos permite hacer lo mismo, simplemente debemos pulsar en el botón Agregar Contacto y rellenar los datos solicitados en el formulario.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CrearContacto.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CrearContacto.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Al agregar un contacto podremos escoger de un listado, el proveedor o cliente al que se lo queremos asignar. Además, si ya existen otros contactos para ese proveedor o cliente, en el campo Jefe se mostrará un desplegable, para indicar si este nuevo contacto es el subordinado de algún otro contacto.")?>