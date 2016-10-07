<?php echo __("La ficha de la empresa de transporte, nos muestra todos los datos relativos a la empresa de una manera individual. En otra pestaña nos muestra todos los conductores que dispone en plantilla y que tenemos datos sobre ellos.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'FichaTransporteEmpresa.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/FichaTransporteEmpresa.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Como indicábamos en el apartado de la edición de la empresa de transporte, desde la ficha disponemos de un botón para editar los datos de la empresa.")?>