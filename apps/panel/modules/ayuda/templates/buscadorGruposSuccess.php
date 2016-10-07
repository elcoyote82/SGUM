<?php echo __("Disponemos de un buscador, el cual nos permite filtrar a los grupos por su nombre. 
		Para ello elegimos el grupo deseado en el selector y hacemos clic en Buscar. Si hacemos clic en 
		Restablecer	nos muestra todos los grupos disponibles, restablece la búsqueda.	
		")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorGrupos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorGrupos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>