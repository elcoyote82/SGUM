<?php echo __("En esta sección explicaremos paso a paso como se realiza una salida de mercancías.")?>
<p><?php echo __("1. Pulsando en el icono de Procesar Salida de cualquiera de las salidas pendientes, tanto en el listado de Administrar Salidas como en el de Salidas Pendientes aparecerá la siguiente pantalla."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'ProcesarSalida.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/ProcesarSalida.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p>
	<?php echo __("2. La pantalla de Procesar Salida nos mostrará todos los artículos que se van a vender desglosados por unidad. Es decir, si nosotros vendemos 6 unidades de un artículo X, aparecerán 6 líneas de salida para ese artículo X."); ?>
	<br/>
	<?php echo __("Únicamente debemos ir a la ubicación que nos muestra automáticamente SGUM, y marcar como cargada. La ubicación mostrada es de la mercancía que lleva más tiempo en el almacén.")?>
</p>

<p><?php echo __("3. Una vez con todas las mercancías cargadas pulsamos en Procesar y se genera el informe de salida, con los datos de la misma, cliente y la lista de los artículos desglosados por unidad con su ubicación y su lote cuando se encontraban dentro de nuestro almacén. La salida pasará de estado ‘Pendiente’ a ‘Procesada’ y la venta pasará de ‘Completa’ a ‘Procesada’."); ?></p>

<p><?php echo __("4. En este momento el stock de los artículos se actualizará, es decir, aunque la venta esté completa, sino se procesa la salida los artículos no tendrán el stock actualizado. Además también se actualiza la capacidad de las ubicaciones."); ?></p>