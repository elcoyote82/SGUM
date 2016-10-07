<?php echo __("Para agregar un nuevo estado simplemente tendremos que escoger en el submenú el estado que deseamos.
		En este caso Crear Estado Pedido, y rellenaremos el formulario que aparece con los datos que luego se 
		almacenarán en la Base de Datos.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CrearEstado.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CrearEstado.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>