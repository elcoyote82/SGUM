<?php echo __("Al igual que en todos los listados de SGUM, podremos buscar los informes por diferentes criterios. Simplemente elegimos el criterio deseado y hacemos clic en Buscar. Si no existe ninguno nos lo mostrará por pantalla, sino aparecerá una lista con los contactos encontrados. Si hacemos clic en Restablecer nos muestra todos los contactos disponibles, restablece la búsqueda."); ?>
 <ul>
	<li>
		<?php echo __("<b>Por Número de Informe:</b> según el número de informe.")?>
	</li>
	<li>
		<?php echo __("<b>Por Fecha de Creación</b>: según la fecha de creación del informe.")?>
	</li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorInformes.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorInformes.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Indicar que podemos agrupar las diferentes columnas pulsando sobre ellas."); ?>