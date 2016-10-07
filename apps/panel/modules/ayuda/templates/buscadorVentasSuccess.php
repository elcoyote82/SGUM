<?php echo __("En los listados de las ventas disponemos también de buscadores. Al igual que en pedidos, los criterios de búsqueda de todos los diferentes listados son idénticos a excepción de Administración de ventas que dispone de un filtro más. Para buscar sólo tenemos que elegir el criterio deseado y hacemos clic en Buscar."); ?>
<p><?php echo __("Si no existe ninguno nos lo mostrará por pantalla, sino aparecerá una lista con las ventas encontradas. Si hacemos clic en Restablecer nos muestra todas las ventas disponibles, restablece la búsqueda."); ?></p>
<?php echo __("Los criterios de búsqueda que podemos elegir son los siguientes:"); ?>
 <ul>
	<li>
		<?php echo __("<b>Por Estados</b>: Este filtro está disponible únicamente en la administración de ventas, donde se listan todas, y se usa para buscar por el estado en el que se encuentra la venta.")?>
	</li>
	<li>
		<?php echo __("<b>Por Proveedor</b>: según el nombre del cliente.")?>
	</li>
	<li>
		<?php echo __("<b>Por Fecha de Creación</b>: según la fecha de creación de la venta.")?>
	</li>
</ul>
<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorVentas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorVentas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Indicar que podemos agrupar las diferentes columnas de los listados pulsando sobre ellas."); ?>