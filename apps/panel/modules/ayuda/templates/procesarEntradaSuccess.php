<?php echo __("En esta sección explicaremos paso a paso como se realiza una entrada de mercancías.")?>
<p><?php echo __("1. Pulsando en el icono de Procesar Entrada de cualquiera de las entradas pendientes, tanto en el listado de Administrar Entradas como en el de Entradas Pendientes aparecerá la siguiente pantalla."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'ProcesarEntrada.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/ProcesarEntrada.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p>
	<?php echo __("2. La pantalla de Procesar Entrada nos mostrará todos los artículos solicitados en el pedido, desglosados por unidad. Es decir, si nosotros pedimos 6 unidades de un artículo X, aparecerán 6 líneas de entrada para ese artículo X."); ?>
	<br/>
	<?php echo __("Únicamente debemos escoger la ubicación donde colocaremos el pedido y rellenar el Lote del artículo para hacerlo identificable y que no se pierda la trazabilidad.")?>
</p>

<p><?php echo __("3. Una vez escogidos todas las ubicaciones y completado todos los lotes, pulsando Procesar se genera el informe de entrada, con los datos de la entrada, proveedor y la lista de los artículos desglosados por unidad con su ubicación y su lote. Y la entrada pasará de estado ‘Pendiente’ a ‘Procesada’ y el pedido pasará de ‘Completo’ a ‘Procesado’."); ?></p>

<p><?php echo __("4. En este momento el stock de los artículos se actualizará, es decir, aunque el pedido esté completo, sino se procesa la entrada los artículos no tendrán el stock actualizado."); ?></p>