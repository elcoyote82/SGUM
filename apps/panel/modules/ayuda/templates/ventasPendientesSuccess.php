<?php echo __("Se listarán todas las ventas pendientes, es decir, aquellas cuyo estado sea ‘Borrador’. En este caso las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Confirmar Venta"); ?></strong><?php echo image_tag('manual/icono_ok.png');?><?php echo __("Pulsando en el icono de Confirmar Venta el estado de la venta pasará de ‘Borrador’ a ‘En Proceso…’. Con esta acción confirmamos que los datos escogidos son correctos y partir de ahora ya no se podrán editar o borrar, ya que se perdería la trazabilidad.");?></li>
  <br/>
  <li><strong><?php echo __("Editar Venta"); ?></strong><?php echo image_tag('manual/icono_editar.png');?><?php echo __("Pulsando en el icono de Editar Venta, siempre y cuando no lo hayamos confirmado, nos permitirá editar los artículos de la venta por si hubiera existido algún error.");?></li>
  <br/>
  <li><strong><?php echo __("Borrar Venta"); ?></strong><?php echo image_tag('manual/icono_borrar.png');?><?php echo __("Al igual que la acción de editar, la acción de  Borrar Venta sólo está activa siempre que la venta se encuentre en estado ‘Borrador’. Si vemos que hemos creado una venta pero no nos interesa seguir con ella, podemos borrarla pulsando el icono, nos pedirá confirmación pero una vez aceptada esa venta eliminará definitivamente.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VentasPendientes.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VentasPendientes.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>