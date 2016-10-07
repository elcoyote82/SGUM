<?php echo __("Se listarán todos los pedidos pendientes, es decir, aquellos cuyo estado sea ‘Borrador’. En este caso las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Confirmar Pedido"); ?></strong><?php echo image_tag('manual/icono_ok.png');?><?php echo __("Pulsando en el icono de Confirmar Pedido el estado del pedido pasará de ‘Borrador’ a ‘En Proceso…’. Con esta acción confirmamos que los datos escogidos son correctos y partir de ahora ya no se podrán editar o borrar, ya que se perdería la trazabilidad.");?></li>
  <br/>
  <li><strong><?php echo __("Editar Pedido"); ?></strong><?php echo image_tag('manual/icono_editar.png');?><?php echo __("Pulsando en el icono de Editar Pedido, siempre y cuando no lo hayamos confirmado, nos permitirá editar los artículos del pedido por si hubiera existido algún error.");?></li>
  <br/>
  <li><strong><?php echo __("Borrar Pedido"); ?></strong><?php echo image_tag('manual/icono_borrar.png');?><?php echo __("Al igual que la acción de editar, la acción de  Borrar Pedido sólo está activa siempre que el pedido se encuentre en estado ‘Borrador’. Si vemos que hemos creado un pedido pero no nos interesa seguir con él, podemos borrarlo pulsando el icono, nos pedirá confirmación pero una vez aceptada se eliminará definitivamente.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'PedidosPendientes.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/PedidosPendientes.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>