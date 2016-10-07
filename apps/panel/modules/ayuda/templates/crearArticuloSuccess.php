<?php echo __("Podremos agregar un nuevo artículo a nuestra base de datos haciendo clic en Agregar Artículo y 
	rellenando los datos solicitados en el formulario. El artículo se almacenará con stock cero hasta que se 
	produzca una entrada de mercancías.")?>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'CrearArticulo.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/CrearArticulo.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<p><?php echo __("Los artículos pueden tener uno o más proveedores. En el caso de tener un único proveedor, 
	únicamente escogemos el elegido y listo. Para escoger varios de la lista que aparece en el formulario, 
	debemos pulsar la tecla Ctrl y hacer clic en los proveedores que nos proporcionan el artículo. Para 
	desmarcar un proveedor se vuelve a pulsar sobre su nombre y listo.")?>
</p>
<p>
<?php echo __("En el formulario tenemos la opción de marcar ‘aviso mínimo’ o no. En el caso de seleccionar ‘Sí’, 
	debemos escoger la cantidad mínima que podremos tener de ese artículo antes de que la aplicación SGUM nos 
	avise de que debemos realizar un pedido. En caso de no marcarlo, SGUM nos avisará cuando el stock llegue 
	a cero. Estos avisos se muestran en la pantalla principal.")?>
</p>