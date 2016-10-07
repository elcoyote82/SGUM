<?php echo __("Aquí se muestran todos los pedidos procesados, aquellos que ya se encuentran dentro del almacén y ubicados. Y finalmente las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Ver Pedido Completo"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("Pulsando en el icono de Ver Pedido Completo iremos a la ficha del pedido completo. Al igual que la ficha de Ver Pedido se mostrarán los datos del pedido, el proveedor, las mercancías pedidas y el informe generado, pero a mayores podremos ver la entrada, los artículos con su lote y ubicación y el informe de entrada generado.");?></li>
  <br/>
  <li><strong><?php echo __("Descargar Informe"); ?></strong><?php echo image_tag('manual/icono_pdf.png');?><?php echo __("Pulsando en el icono de Descargar Informe, podremos descargar el informe del pedido generado al confirmar el mismo. En él se muestran los datos del proveedor, número de pedido y los artículos solicitados junto con su cantidad.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'PedidosProcesados.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/PedidosProcesados.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>