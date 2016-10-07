<?php echo __("Como en todos los listados del proyecto en los pedidos también disponemos de un buscador. En este caso los criterios de búsqueda son los mismos para todos los listados de pedidos, a excepción de Administración de pedidos que dispone de un filtro más. Para buscar sólo tenemos que elegir el criterio deseado y hacemos clic en Buscar."); ?>
<p><?php echo __("Si no existe ninguno nos lo mostrará por pantalla, sino aparecerá una lista con los pedidos encontrados. Si hacemos clic en Restablecer nos muestra todos los pedidos disponibles, restablece la búsqueda."); ?></p>
<?php echo __("Los criterios de búsqueda que podemos elegir son los siguientes:"); ?>
 <ul>
	<li>
		<?php echo __("<b>Por Estados</b>: este filtro está disponible únicamente en la administración de pedidos, donde se listan todos los pedidos, y se usa para buscar por el estado en el que se encuentra el pedido.")?>
	</li>
	<li>
		<?php echo __("<b>Por Proveedor</b>: según el nombre del proveedor al que se la ha realizado el pedido.")?>
	</li>
	<li>
		<?php echo __("<b>Por Fecha de Creación</b>: según la fecha de creación del pedido.")?>
	</li>
</ul>
<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorPedidos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorPedidos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Indicar que podemos agrupar las diferentes columnas de los listados pulsando sobre ellas."); ?>