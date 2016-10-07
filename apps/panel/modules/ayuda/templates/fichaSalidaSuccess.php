<?php echo __("La ficha de la salida nos mostrará toda la información en diferentes pestañas. En el caso de ser una salida pendiente, la pestaña del Informe Salida no mostrará nada, ya que todavía no se ha generado. La información mostrada son los datos de la salida, con los artículos mostrando el lote y ubicación que tenían en el almacén, el informe de salida, datos de la venta, cliente y el informe de la venta.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaSalida.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaSalida.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>