<?php echo __("En la pantalla principal de la administración de usuarios disponemos de un buscador, el cual nos 
		permite filtrar a los usuarios por diferentes criterios. Para ello elegimos el criterio deseado y hacemos 
		clic en Buscar. Si no existe ninguno nos lo mostrará por pantalla, sino aparecerá una lista con los 
		usuarios encontrados. Si hacemos clic en Restablecer nos muestra todos los usuarios disponibles, 
		restablece la búsqueda.
		Los criterios de búsqueda que podemos elegir son los siguientes:	
		")?>
 <ul>
	<li>
		<?php echo __("<b>Por Usuario</b>: según el nombre que el usuario utiliza para iniciar la sesión.")?>
	</li>
	<li>
		<?php echo __("<b>Por Grupo</b>: según el grupo al que pertenezca el usuario.")?>
	</li>
	<li>
		<?php echo __("<b>Por Permiso</b>: según el permiso que disponga el usuario.")?>
	</li>
	<li>
		<?php echo __("<b>Por Fecha de Creación</b>: según la fecha de creación del usuario.")?>
	</li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorUsuarios.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorUsuarios.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>