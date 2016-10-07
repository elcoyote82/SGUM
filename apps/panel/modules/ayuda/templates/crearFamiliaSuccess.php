<?php echo __("Podremos agregar una nueva familia haciendo clic en Agregar Familia y rellenando los datos solicitados en el formulario. Pulsando el botón Guardar se almacenará en la base de Datos y estará disponible para agrupar a los artículos.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CrearFamilia.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CrearFamilia.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>