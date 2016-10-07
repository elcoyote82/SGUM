<?php echo __("Se listan todas las ventas que han sido confirmadas y que se encuentran a la espera de que disponemos de todas las mercancías en el almacén para que puedan ser suministrada al cliente al que le realizamos la venta. En este caso las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Ver Venta"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("Pulsando en el icono de Ver Venta iremos a la ficha de la venta. Donde se mostrarán los datos de la venta, el cliente, y las mercancías vendidas junto al informe generado.");?></li>
  <br/>
  <li><strong><?php echo __("Descargar Informe"); ?></strong><?php echo image_tag('manual/icono_pdf.png');?><?php echo __("Pulsando en el icono de Descargar Informe, podremos descargar el informe de la venta generado al confirmarla. En él se muestran los datos del cliente, número de venta y los artículos vendidos junto con su cantidad.");?></li>
  <br/>
  <li><strong><?php echo __("Confirmar Venta Enviada"); ?></strong><?php echo image_tag('manual/icono_flecha.png');?><?php echo __("Cuando en el almacén nos confirmen que disponemos de todos los artículos deberemos pulsar el icono de Confirmar Venta Enviada para hacer que el pedido pase de estado “En Proceso…’ a ‘Enviada’. En este paso se agrega el nombre del conductor que enviará las mercancías.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VentasEnProceso.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VentasEnProceso.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>