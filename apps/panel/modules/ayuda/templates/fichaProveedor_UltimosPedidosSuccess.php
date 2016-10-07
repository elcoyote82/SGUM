<?php echo __("<b>Pestaña Últimos Pedidos:</b> Muestra los últimos pedidos (10) realizados al proveedor. Nos mostrará su estado, y en el caso de haberse completado podremos descargar los diferentes informes que se crearon durante el proceso.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaProveedor_UltimosPedidos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaProveedor_UltimosPedidos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>