<?php echo __("Podremos ver los distintos grupos creados por el administrador desde el listado de grupos. Desde 
		aquí podremos consultar los datos principales de cada grupo creado, además de los usuarios que pertenecen
		a cada grupo."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerGrupos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerGrupos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Desde el listado de grupos podremos ver cada uno de los usuarios que pertenecen a él."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'ListadoUsuariosXGrupo.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/ListadoUsuariosXGrupo.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>