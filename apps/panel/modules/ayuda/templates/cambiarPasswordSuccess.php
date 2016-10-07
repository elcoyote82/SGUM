<?php echo __("Para cada usuario podemos modificar su contraseña de acceso a la aplicación haciendo clic en el 
	botón “Cambiar Password”. Para ello sólo tendremos que introducir la nueva contraseña (dos veces) en los 
	campos del formulario que aparece en pantalla, y a continuación hacer clic en Guardar para almacenarla. 
	A partir de ahí el usuario ya tendrá asociada la nueva contraseña.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CambiarPassword.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CambiarPassword.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>