<?php echo __("Podremos ver las distintas empresas creadas desde la sección Empresas de Transporte del módulo Transporte. Desde aquí podremos consultar los principales datos de cada empresa, su nombre, dirección, teléfono, etc."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerTransporteEmpresas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerTransporteEmpresas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>