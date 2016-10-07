<?php echo __("Para borrar una empresa de transporte sólo tenemos que buscarla desde el listado de empresas y hacer clic en el botón de borrado que aparece a la derecha de la empresa en cuestión. Un mensaje por pantalla nos preguntará si estamos seguros de borrarlo. Si aceptamos la empresa se eliminará definitivamente.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BorrarTransporteEmpresa.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BorrarTransporteEmpresa.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Si la empresa dispone de conductores asignados, no es posible borrar la empresa de transporte.")?>