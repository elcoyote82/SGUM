<?php echo __("Podremos crear un nuevo conductor haciendo clic en Agregar Conductor y rellenando los datos solicitados en el formulario, los cuales se almacenarán en la Base de Datos.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CrearTransporteConductor.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CrearTransporteConductor.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Desde el formulario podemos asignarle al conductor la empresa a la que pertenece. En el caso de no existir, pulsando en ‘nueva empresa’, saldrá un nuevo campo donde introduciremos el nombre de la nueva empresa que se guardará a la vez que los datos del nuevo conductor."); ?>