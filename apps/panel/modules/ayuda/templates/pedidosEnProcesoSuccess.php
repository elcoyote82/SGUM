<?php echo __("Se listan todos los pedidos que han sido confirmados y que se encuentran a la espera de que lleguen las mercancías pedidas a los proveedores. En este caso las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Ver Pedido"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("Pulsando en el icono de Ver Pedido iremos a la ficha del pedido. Donde se mostrarán los datos del pedido, el proveedor, las mercancías pedidas y el informe generado.");?></li>
  <br/>
  <li><strong><?php echo __("Descargar Informe"); ?></strong><?php echo image_tag('manual/icono_pdf.png');?><?php echo __("Pulsando en el icono de Descargar Informe, podremos descargar el informe del pedido generado al confirmar el mismo. En él se muestran los datos del proveedor, número de pedido y los artículos solicitados junto con su cantidad.");?></li>
  <br/>
  <li><strong><?php echo __("Confirmar Pedido Recibido"); ?></strong><?php echo image_tag('manual/icono_flecha.png');?><?php echo __("Una vez recibidas las mercancías deberemos pulsar el icono de Confirmar Pedido Recibido para hacer que el pedido pase de estado “En Proceso…’ a ‘Recibido’. En este paso se agrega el nombre del conductor que ha entregado las mercancías.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'PedidosEnProceso.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/PedidosEnProceso.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>