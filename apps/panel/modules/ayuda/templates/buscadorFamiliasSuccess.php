<?php echo __("En la pantalla principal de la administración de familias disponemos de un buscador, el cual nos permite filtrar las familias por su nombre y la fecha de creación de la misma. Para ello escribiremos el nombre o una parte del mismo y hacemos clic en Buscar. Si no existe ninguna nos lo mostrará por pantalla, sino aparecerá una lista con las familias encontrados. Si hacemos clic en Restablecer nos muestra todos los familias disponibles, restablece la búsqueda.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorFamilias.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorFamilias.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>