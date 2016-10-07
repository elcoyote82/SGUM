<?php echo __("Se muestran todas las entradas pendientes que se generan al pasar un pedido de estado ‘Recibido’ a ‘Completo’. En esta caso las entradas tiene estado ‘Pendientes’. Las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Procesar Entrada"); ?></strong><?php echo image_tag('manual/icono_flecha.png');?><?php echo __("Pulsando en el icono de Procesar Entrada empezamos el proceso de colocación de las mercancías en las ubicaciones dentro del almacén. Una vez colocadas todas las mercancías y asignadas su lote la entrada pasará de estado ‘Pendiente’ a ‘Procesada’. Además generaremos un informe de entrada y el pedido pasará de estado ‘Completo’ a ‘Procesado’.");?></li>
  <br/>
  <li><strong><?php echo __("Ver Entrada"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("Pulsando en el icono de Ver Entrada se mostrará la ficha de la entrada. Al igual que la ficha de Ver Pedido Completo pero centrándose en la entrada, se mostrarán los datos de la entrada, las mercancías recibidas, datos del conductor y su empresa, los datos del pedido, el proveedor, las mercancías pedidas y el informe generado. La entrada se encuentra en estado ‘Pendiente’, por lo que la ficha no muestra aún el informe de entrada.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'EntradasPendientes.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/EntradasPendientes.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>