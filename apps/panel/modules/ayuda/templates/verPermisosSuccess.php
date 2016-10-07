<?php echo __("Podremos ver los distintos permisos creados por el administrador desde el listado de permisos. 
		Desde aquí podremos consultar los datos principales de cada permiso creado, además de los usuarios y 
		grupos a los que está asignado cada permiso."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerPermisos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerPermisos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Desde el listado de permisos podremos ver cada uno de los usuarios que tienen asignado un permiso 
		concreto."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'ListadoUsuariosXPermiso.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/ListadoUsuariosXPermiso.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("De idéntica forma ocurre con los grupos. "); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'ListadoGruposXPermiso.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/ListadoGruposXPermiso.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>