<?php echo __("En esta sección explicaremos paso a paso como se realiza un pedido.")?>
<p><?php echo __("1. Pulsar en Agregar Pedido del submenú, o en cualquiera de los múltiples botones Hacer Pedido que encontramos a lo largo de la aplicación y aparecerá la siguiente pantalla."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarPedido1.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarPedido1.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p>
	<?php echo __("2. En esta pantalla debemos escoger un Proveedor a través del selector o escribir un nombre de un artículo y pulsar Buscar."); ?>
	<br>
	<?php echo __("Si buscamos mediante un proveedor veremos la siguiente pantalla.")?>
</p>
<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarPedido2.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarPedido2.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("En el caso de buscar por nombre, al comenzar a escribir el nombre aparecerá un cuadro de texto en el que se listarán todos los artículos que se encuentren bajos de stock y tengan un nombre similar a lo escrito.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarPedido3.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarPedido3.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("3. En cualquiera de los dos casos se listarán los datos del proveedor o del artículo escogido, y habrá que pulsar en el icono ").image_tag('manual/icono_libreta.png').__("para generar el pedido. En este momento se genera el pedido se establece el estado del pedido a ‘Borrador’."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarPedido4.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarPedido4.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("4. En la siguiente pantalla se listarán las líneas de los artículos incluidos en el pedido. Podremos agregar nuevos artículos buscándolos a través del buscador y pulsando en Agregar Artículo, y al igual que antes se mostrará un cuadro de texto en el que se listarán todos los artículos del proveedor al que le estamos realizando el pedido."); ?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarPedido5.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarPedido5.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Podremos cambiar la cantidad de artículos pulsando en los iconos ").image_tag('manual/icono_mas.png').__(" y ").image_tag('manual/icono_menos').__(" si queremos más o menos cantidad respectivamente. Además si hemos escogido un artículo que no queríamos pedir, es posible borrar esa línea pulsando ").image_tag('manual/icono_borrar.png');?>
<?php echo __("Pulsamos en Confirmar Pedido para generar el pedido."); ?>

<p><?php echo __("5. En este momento el pedido se encuentra en el estado ‘Borrador’. Por lo que como explicamos anteriormente podremos confirmar el pedido, editarlo o borrarlo definitivamente."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarPedido6.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarPedido6.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("6. Si quisiésemos editar el pedido, iríamos a la pantalla anterior y podríamos editar las líneas de pedido al igual que hacíamos cuando lo estábamos generando. Para borrar el pedido nos pediría confirmación, y en el caso de aceptar se suprimiría el pedido definitivamente."); ?></p>

<p><?php echo __("7. Pulsando en ").image_tag('manual/icono_ok.png').__(" confirmamos que el pedido es correcto, el estado pasa de ‘Borrador’ a ‘En proceso…’  y se genera un informe con ese pedido. En la ficha del pedido disponemos de la posibilidad de ver los datos del mismo y visualizar el informe generado."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarPedido6.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarPedido6.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("8. En el momento que ha llegado el pedido con las mercancías pulsamos en ").image_tag('manual/icono_flecha.png').__(" para confirmar el pedido recibido. Escogemos el conductor que sido el encargado del transporte y el estado pasa de ‘En proceso…’ a ‘Recibido’."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarPedido8.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarPedido8.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("9. Ahora deberemos comprobar que el pedido está completo, pulsando en ").image_tag('manual/icono_ojo.png').__(" y marcando en los checkbox que el pedido ha sido entregado con la cantidad de artículos pedida. En el caso de que no estén todos, se mantiene en estado ‘Recibido’. Al confirmar el pedido completo, el estado pasa a ‘Completo’ y se genera una entrada ‘Pendiente’ en el módulo de entradas."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarPedido9.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarPedido9.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("10. El proceso de las entradas lo explicaremos en el módulo entradas. Pero una vez procesada la entrada el Pedido pasa de ‘Completo’ a ‘Procesado’ y podremos ver en la ficha del pedido completo todos los datos del pedido, entrada, proveedor, conductor e informes generados."); ?></p>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'AgregarPedido10.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/AgregarPedido10.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>