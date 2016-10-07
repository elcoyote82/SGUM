<?php echo __("En la pantalla principal de la administración de conductores disponemos de un buscador, el cual nos permite filtrar a los mismos por diferentes criterios. Para ello elegimos el criterio deseado y hacemos clic en Buscar. Si no existe ninguno nos lo mostrará por pantalla, sino aparecerá una lista con los conductores encontrados. Si hacemos clic en Restablecer nos muestra todos los conductores disponibles, restablece la búsqueda.
		Los criterios de búsqueda que podemos elegir son los siguientes:	
		")?>
 <ul>
	<li>
		<?php echo __("<b>Por Nombre</b>: según el nombre del conductor.")?>
	</li>
	<li>
		<?php echo __("<b>Por Apellidos</b>: según los apellidos del conductor.")?>
	</li>
	<li>
		<?php echo __("<b>Por Empresa</b>: según la empresa a la que pertenezca el conductor.")?>
	</li>
	<li>
		<?php echo __("<b>Por Fecha de Creación</b>: según la fecha de creación del conductor.")?>
	</li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorTransporteConductores.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorTransporteConductores.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>