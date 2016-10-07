<?php echo __("<b>Pestaña Últimas Ventas:</b> Muestra las últimos ventas (10) realizadas al cliente. Nos mostrará su estado, y en el caso de haberse completado podremos descargar los diferentes informes que se crearon durante el proceso.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaCliente_UltimasVentas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaCliente_UltimasVentas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>