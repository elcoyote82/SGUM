<p><?php echo __("En el módulo de Proveedores y de Clientes indicábamos que podíamos agregarles contactos. Para ver un listado de todos los contactos que tenemos guardados en la aplicación, vamos al módulo Contactos, y en la página principal se listarán todos los contactos que hemos agregado, independientemente sean de un proveedor o un cliente."); ?></p>
<p><?php echo __("Además, en el submenú se no permite listar todos los contactos de los proveedores o de los cliente por separado."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerContactos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerContactos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>