<?php echo __("Aquí se muestran todas las ventas procesadas y que ya han sido suministradas al cliente. Y finalmente las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Ver Venta Completa"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("Pulsando en el icono de Ver Venta Completa iremos a la ficha de la venta completa. Al igual que la ficha de Ver Venta se mostrarán los datos de la venta, cliente, mercancías vendidas y el informe generado, pero a mayores podremos ver la salida, los artículos con su lote y ubicación y el informe de salida generado.");?></li>
  <br/>
  <li><strong><?php echo __("Descargar Informe"); ?></strong><?php echo image_tag('manual/icono_pdf.png');?><?php echo __("Pulsando en el icono de Descargar Informe, podremos descargar el informe de la venta generado. En él se muestran los datos del cliente, número de venta y los artículos vendidos junto con su cantidad.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VentasProcesadas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VentasProcesadas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>