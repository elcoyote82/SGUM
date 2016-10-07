<?php echo __("En esta apartado tenemos la posibilidad de encontrar todos los informes generados en la aplicación según sean de pedidos, entradas, salidas o ventas."); ?>

<p><?php echo __("Todos los listados disponen de las mismas opciones en cuanto a buscadores y acciones a realizar con los informes. Para ir navegando entre los informes usaremos el submenú, que no permitirá entrar en los diferentes estados"); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerInformes.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerInformes.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>