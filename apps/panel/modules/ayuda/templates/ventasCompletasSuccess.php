<?php echo __("Se listan las ventas completas, es decir, aquellas de las que disponemos del stock para ser procesadas y que le lleguen al cliente. Aquellas ventas que tienen la salida pendiente de ser procesada aparecerán en este listado. En este caso las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Ver Venta"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("Pulsando en el icono de Ver Venta iremos a la ficha de la venta. Donde se mostrarán los datos de la venta, el cliente, las mercancías vendidas y el informe generado.");?></li>
  <br/>
  <li><strong><?php echo __("Descargar Informe"); ?></strong><?php echo image_tag('manual/icono_pdf.png');?><?php echo __("Pulsando en el icono de Descargar Informe, podremos descargar el informe de la venta. En él se muestran los datos del cliente, número de venta y los artículos vendidos junto con su cantidad.");?></li>
  <br/>
  <li><strong><?php echo __("Comprobar Venta Completa"); ?></strong><?php echo image_tag('manual/icono_ojo.png');?><?php echo __("La venta está completa y a la espera que desde el almacén procesen la salida y carguen las mercancías. Pulsando en Procesar Salida iremos a la pantalla donde se procesará esa salida de mercancías. La aplicación automáticamente nos mostrará el lugar donde se encuentran las mercancías a cargar, y simplemente marcaremos a medida que vayamos cargando. Una vez procesada se generará un informe de salida  y la venta pasará de ‘Completa’ a ‘Procesada’ y el estado de la salida de ‘Pendiente’ a ‘Procesada’.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VentasCompletas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VentasCompletas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>