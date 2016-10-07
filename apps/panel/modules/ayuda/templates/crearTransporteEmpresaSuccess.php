<?php echo __("Para crear una nueva empresa de transporte simplemente tendremos que hacer clic en Agregar Empresa y rellenar el formulario que aparece con los datos que luego se almacenarán en la Base de Datos.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CrearTransporteEmpresa.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CrearTransporteEmpresa.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>