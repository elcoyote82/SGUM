<?php echo __("También podemos cambiar el grupo al que pertenece cada usuario desde el listado de usuarios, 
	haciendo clic en el botón “Cambiar Grupo”. Para ello solo tendremos que hacer clic en el botón Cambiar Grupo 
	del usuario en concreto y cambiar el rol que tiene asignado.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CambiarGrupo.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CambiarGrupo.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>