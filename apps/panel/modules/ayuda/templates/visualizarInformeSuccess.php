<?php echo __("Todos los informes disponen de dos acciones, una de ella es visualizar el informe. Para acceder simplemente pulsamos el icono ").image_tag('manual/icono_lupa.png').__(" y se mostrará el informe por pantalla."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VisualizarInforme.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VisualizarInforme.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>