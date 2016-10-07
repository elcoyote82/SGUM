<?php echo __("Se muestran todas las salidas pendientes que se generan al pasar una venta de estado ‘Enviada’ a ‘Completa’. En esta caso las salidas tiene estado ‘Pendientes’. Las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Procesar Salida"); ?></strong><?php echo image_tag('manual/icono_flecha.png');?><?php echo __("Pulsando en el icono de Procesar Salida empezamos el proceso de buscar las mercancías en las ubicaciones dentro del almacén. El sistema automáticamente nos muestra donde se encuentran. Una vez cargadas todas las mercancías la salida pasará de estado ‘Pendiente’ a ‘Procesada’. Además generaremos un informe de salida y la venta pasará de estado ‘Completa’ a ‘Procesada’.");?></li>
  <br/>
  <li><strong><?php echo __("Ver Salida"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("Pulsando en el icono de Ver Salida se mostrará la ficha de la salida. Al igual que la ficha de Ver Venta Completa pero centrándose en la salida. Se muestran los datos de la entrada, mercancías cargadas, datos del conductor y su empresa, datos de la venta, cliente, las mercancías vendidas y el informe generado. La salida se encuentra en estado ‘Pendiente’, por lo que la ficha no muestra aún el informe de salida.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'salidasPendientes.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/salidasPendientes.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>