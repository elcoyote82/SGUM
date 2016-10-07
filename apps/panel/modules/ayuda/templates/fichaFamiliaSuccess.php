<?php echo __("La ficha de la familia nos muestra todos los artículos pertenecientes a la misma, además de mostrar algunos datos interesantes de los mismos, como stock, ubicación, proveedor. El listado nos permite acceder pulsando encima de la imagen, la ubicación o el proveedor acceder a sus fichas respectivas.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaFamilia.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaFamilia.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>