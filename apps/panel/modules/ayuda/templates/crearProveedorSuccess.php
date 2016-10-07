<p><?php echo __("Podremos agregar un nuevo proveedor a nuestra base de datos haciendo clic en Agregar Proveedor y rellenando los datos solicitados en el formulario. El proveedor trae algunas opciones seleccionadas por defecto, como por ejemplo el país, que por defecto sale seleccionado España.")?></p>
<p><?php echo __("Al agregar un proveedor tendremos como campos obligatorios el Nombre, teléfono y el CIF o NIF. En el caso del NIF se realiza una comprobación para que el dato se encuentre correctamente cubierto, en el caso de no serlo mostrará un mensaje de error. Por ejemplo si escribió la letra equivocada, se sugiere la letra correcta.")?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CrearProveedor.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CrearProveedor.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Además de un teléfono y el móvil, podremos agregar otro teléfono pulsando en el icono que se encuentra debajo del campo.")?>