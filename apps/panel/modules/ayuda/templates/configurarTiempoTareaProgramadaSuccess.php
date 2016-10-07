<p><?php echo __("La aplicación SGUM dispone de una tarea programada que se ejecuta en segundo plano para actualizar el stock de los artículos y, en caso de estar alguno de ellos sin existencias mostrarlo en la página principal para tener constancia de que es necesario hacer un pedido de ese artículo.")?></p>
<p><?php echo __("En el momento de la instalación la tarea se ejecuta cada 5 minutos, pero este tiempo se puede modificar en el selector y pulsando en el botón Actualizar.")?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'ConfigurarTiempoTareaProgramada.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/ConfigurarTiempoTareaProgramada.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Además podremos actualizar el stock de los artículos en cualquier momento, es decir, sin esperar a que se ejecute la tarea pulsando el botón Ahora de la columna Actualizar Stock."); ?>