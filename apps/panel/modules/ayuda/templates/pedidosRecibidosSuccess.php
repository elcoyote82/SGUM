<?php echo __("Aquí se muestran los pedidos recibidos en el almacén y que están esperando a ser comprobados, es decir, mirar si han llegado todas las mercancías pedidas. En el caso de que no hayan llegado se mantienen en este estado. Las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Ver Pedido"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("Pulsando en el icono de Ver Pedido iremos a la ficha del pedido. Donde se mostrarán los datos del pedido, el proveedor, las mercancías pedidas y el informe generado.");?></li>
  <br/>
  <li><strong><?php echo __("Descargar Informe"); ?></strong><?php echo image_tag('manual/icono_pdf.png');?><?php echo __("Pulsando en el icono de Descargar Informe, podremos descargar el informe del pedido generado al confirmar el mismo. En él se muestran los datos del proveedor, número de pedido y los artículos solicitados junto con su cantidad.");?></li>
  <br/>
  <li><strong><?php echo __("Comprobar Pedido Completo"); ?></strong><?php echo image_tag('manual/icono_ojo.png');?><?php echo __(" Una vez recibidas las mercancías, pulsando el botón Comprobar Pedido Completo podremos confirmar que todos los artículos solicitados han llegado y que su cantidad es la correcta. Una vez confirmado el pedido pasa de estado ‘Recibido’ a ‘Completo’ y se genera una entrada de mercancías pendientes.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'PedidosRecibidos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/PedidosRecibidos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>