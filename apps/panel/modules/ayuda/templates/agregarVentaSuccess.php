<?php echo __("En esta sección explicaremos paso a paso como se realiza una venta.")?>
<p><?php echo __("1. Pulsar en Agregar Venta del submenú y aparecerá la siguiente pantalla"); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarVenta1.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarVenta1.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("2. En esa pantalla veremos un listado con los clientes a los que podemos realizar venta. Si no aparece podemos utilizar el buscador, seleccionar el cliente  y pulsar Buscar."); ?></p>

<p><?php echo __("3. En cualquier caso, saldrán los datos del cliente y habrá que pulsar en el icono ").image_tag('manual/icono_libreta.png').__(" para generar la venta. En este momento se genera la venta y se establece el estado a ‘Borrador’."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarVenta2.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarVenta2.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("4. En la siguiente pantalla se listarán las líneas de los artículos incluidos en la venta. Podremos agregar nuevos artículos buscándolos a través del buscador y pulsando en Agregar Artículo. Al usar el buscador, en el momento de escribir irá apareciendo en un cuadro de texto un listado con todos los artículos con stock suficiente para poder vender."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarVenta3.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarVenta3.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Podremos cambiar la cantidad de artículos pulsando en los iconos ").image_tag('manual/icono_mas.png').__(" y ").image_tag('manual/icono_menos').__(" si queremos más o menos cantidad respectivamente. Además si hemos escogido un artículo que no queríamos vender, es posible borrar esa línea pulsando ").image_tag('manual/icono_borrar.png');?>
<?php echo __("Pulsamos en Confirmar Venta para generar la venta."); ?>

<p><?php echo __("5. En este momento la venta se encuentra en el estado ‘Borrador’. Por lo que como explicamos anteriormente podremos confirmarla, editarla o borrarla definitivamente."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarVenta4.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarVenta4.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("6. Si quisiésemos editar la venta, iríamos a la pantalla anterior y podríamos editar las líneas de la venta al igual que hacíamos cuando la estábamos generando. Para borrar la venta nos pedirá confirmación, y en el caso de aceptar se suprimiría definitivamente."); ?></p>

<p><?php echo __("7. Pulsando en ").image_tag('manual/icono_ok.png').__(" confirmamos que la venta es correcta, el estado pasa de ‘Borrador’ a ‘En proceso…’  y se genera un informe con esa venta. En la ficha de la venta disponemos de la posibilidad de ver los datos de la misma y visualizar el informe generado."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarVenta5.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarVenta5.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("8. En el momento que disponemos de las mercancías para vender pulsamos en ").image_tag('manual/icono_flecha.png').__(" para confirmar la venta como enviada. Escogemos el conductor que se encargará  de del transporte y el estado pasa de ‘En proceso…’ a ‘Enviada’."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarVenta6.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarVenta6.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("9. Ahora deberemos comprobar que disponemos de todas los artículos para la venta. Pulsamos en ").image_tag('manual/icono_ojo.png').__(" y marcamos en los checkbox para saber que disponemos de todas las mercancías. En el caso de que no estén todas, se mantiene en estado ‘Enviada’. Al confirmar la venta, el estado pasa a ‘Completa’ y se genera una salida ‘Pendiente’ en el módulo de salidas."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarVenta7.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarVenta7.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("10. El proceso de las salidas lo explicaremos en el módulo salidas. Pero una vez procesada la salida la Venta pasa de ‘Completa’ a ‘Procesada’ y podremos ver en la ficha de la venta todos los datos de la venta, salida, cliente, conductor e informes generados."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarVenta8.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarVenta8.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>