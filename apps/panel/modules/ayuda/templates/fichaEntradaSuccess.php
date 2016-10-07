<?php echo __("La ficha de la entrada nos mostrará toda la información en diferentes pestañas. En el caso de ser una entrada pendiente, la pestaña del Informe Entrada no mostrará nada, ya que todavía no se ha generado. La información mostrada son los datos de la entrada, con los artículos mostrando el lote y ubicación en el almacén, el informe de entrada, os datos del pedido, proveedor y el informe de pedido.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaEntrada.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaEntrada.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>