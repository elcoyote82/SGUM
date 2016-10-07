<?php echo __("Disponemos de un buscador, el cual nos permite filtrar a los permisos por su nombre. Para ello 
		elegimos el permiso deseado en el selector y hacemos clic en Buscar. Si hacemos clic en Restablecer 
		nos muestra todos los permisos disponibles, restablece la búsqueda.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorPermisos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorPermisos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>