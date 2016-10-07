<?php echo __("El buscador que encontramos en la pantalla principal del listado de clientes nos permitirá filtrar los mismos por diferentes criterios. Para ello elegimos el criterio deseado y hacemos clic en Buscar. Si no existe ninguno nos lo mostrará por pantalla, sino aparecerá una lista con los clientes encontrados. Si hacemos clic en Restablecer nos muestra todos los clientes disponibles, restablece la búsqueda.
		Los criterios de búsqueda que podemos elegir son los siguientes:	
		")?>
 <ul>
	<li>
		<?php echo __("<b>Por Nombre</b>: según el nombre del cliente.")?>
	</li>
	<li>
		<?php echo __("<b>Por CIF/NIF</b>: según el NIF o CIF del cliente.")?>
	</li>
	<li>
		<?php echo __("<b>Por País</b>: según el país, saldrán todos los clientes de un determinado país.")?>
	</li>
	<li>
		<?php echo __("<b>Por Provincia</b>: según la provincia del cliente, únicamente en el caso de que se encuentre en España. Seleccionando una provincia de la lista, saldrán todos los clientes que se encuentren en la provincia escogida.")?>
	</li>
	<li>
		<?php echo __("<b>Por Fecha de Creación</b>: según la fecha de creación del cliente.")?>
	</li>
</ul>
<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorClientes.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorClientes.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>