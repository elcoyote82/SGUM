<?php echo __("Se listan todos los pedidos completos, aquellos que ya han sido recibidos en el almacén pero que todavía su entrada sigue pendiente. En este caso las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Ver Pedido"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("  Pulsando en el icono de Ver Pedido iremos a la ficha del pedido. Donde se mostrarán los datos del pedido, el proveedor, las mercancías pedidas y el informe generado.");?></li>
  <br/>
  <li><strong><?php echo __("Descargar Informe"); ?></strong><?php echo image_tag('manual/icono_pdf.png');?><?php echo __("Pulsando en el icono de Descargar Informe, podremos descargar el informe del pedido generado al confirmar el mismo. En él se muestran los datos del proveedor, número de pedido y los artículos solicitados junto con su cantidad.");?></li>
  <br/>
  <li><strong><?php echo __("Comprobar Pedido Completo"); ?></strong><?php echo image_tag('manual/icono_ojo.png');?><?php echo __(" El pedido completo está a la espera de ser procesado en las entradas. Pulsando en Procesar Pedido iremos a la pantalla donde podremos procesar la entrada de mercancías. Escogiendo la ubicación y escribiendo el Lote del artículo para diferenciarlo del resto. Una vez procesada se generará un informe de entrada y el pedido pasará de ‘Completo’ a ‘Procesado’ y el estado de la entrada de ‘Pendiente’ a ‘Procesada’.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'PedidosCompletos.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/PedidosCompletos.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>