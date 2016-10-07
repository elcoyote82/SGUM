<?php echo __("En la pantalla principal de la administración de artículos disponemos de un buscador, el cual nos 
		permite filtrar la mercancía por diferentes criterios. Para ello elegimos el criterio deseado y hacemos 
		clic en Buscar. Si no existe ninguno nos lo mostrará por pantalla, sino aparecerá una lista con los 
		artículos  encontrados. Si hacemos clic en Restablecer nos muestra todos los artículos disponibles, 
		restablece la búsqueda.
		Los criterios de búsqueda que podemos elegir son los siguientes:	
		")?>
 <ul>
	<li>
		<?php echo __("<b>Por Nombre</b>: según el nombre del artículo.")?>
	</li>
	<li>
		<?php echo __("<b>Por Familia</b>: según la familia a la que pertenezca el artículo.")?>
	</li>
	<li>
		<?php echo __("<b>Por Ubicación</b>: según la ubicación, saldrán todos los artículos que 
			se encuentren en esa ubicación.")?>
	</li>
	<li>
		<?php echo __("<b>Por Proveedor</b>: según el proveedor que suministra el artículo, saldrán 
			todos los artículos suministrados por el proveedor escogido.")?>
	</li>
	<li>
		<?php echo __("<b>Por Descripción</b>: según la descripción del artículo.")?>
	</li>
	<li>
		<?php echo __("<b>Por Fecha de Creación</b>: según la fecha de creación del artículo.")?>
	</li>
</ul>
<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorArticulos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorArticulos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>