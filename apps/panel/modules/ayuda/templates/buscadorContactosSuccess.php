<?php echo __("El buscador que encontramos en la pantalla principal del listado de contactos nos permitirá filtrar los mismos por diferentes criterios. Para ello elegimos el criterio deseado y hacemos clic en Buscar. Si no existe ninguno nos lo mostrará por pantalla, sino aparecerá una lista con los contactos encontrados. Si hacemos clic en Restablecer nos muestra todos los contactos disponibles, restablece la búsqueda.
		Los criterios de búsqueda que podemos elegir son los siguientes:	
		")?>
 <ul>
	<li>
		<?php echo __("<b>Por Nombre</b>: según el nombre del contacto.")?>
	</li>
	<li>
		<?php echo __("<b>Por Apellidos</b>: según los apellidos del contacto.")?>
	</li>
	<li>
		<?php echo __("<b>Por Cliente</b>: según el cliente escogido en el menú.")?>
	</li>
	<li>
		<?php echo __("<b>Por Proveedor</b>:según el proveedor escogido en el menú..")?>
	</li>
</ul>
<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorContactos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorContactos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("En los listados de Contactos Proveedores y Contactos Clientes, también disponemos de buscadores, usando los mismos criterios que el general.")?>