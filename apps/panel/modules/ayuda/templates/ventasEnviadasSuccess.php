<?php echo __("Aquí se muestran todas las ventas que se han enviado al almacén y que están esperando a comprobar que se disponen de las mercancías. En el caso de que no tengamos todas las mercancías se mantienen en este estado. Las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Ver Venta"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("Pulsando en el icono de Ver Venta iremos a la ficha de la venta. Donde se mostrarán los datos de la venta, el cliente, las mercancías vendidas y el informe generado.");?></li>
  <br/>
  <li><strong><?php echo __("Descargar Informe"); ?></strong><?php echo image_tag('manual/icono_pdf.png');?><?php echo __("Pulsando en el icono de Descargar Informe, podremos descargar el informe de la venta generado. En él se muestran los datos del cliente, número de venta y los artículos vendidos junto con su cantidad.");?></li>
  <br/>
  <li><strong><?php echo __("Comprobar Venta Completa"); ?></strong><?php echo image_tag('manual/icono_ojo.png');?><?php echo __("Cuando se confirma que tenemos todas las mercancías, pulsando el botón Comprobar Venta Completo podremos confirmar que todos los artículos vendidos están disponibles en su cantidad correcta. Una vez confirmada se pasa de estado ‘Enviada a ‘Completa’ y se genera una salida de mercancías pendientes.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VentasEnviadas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VentasEnviadas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>