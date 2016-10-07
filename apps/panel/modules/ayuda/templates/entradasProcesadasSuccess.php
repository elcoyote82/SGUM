<?php echo __("Se listan todos los entradas que han sido procesadas, es decir, las mercancías ya están ubicadas en el almacén. En este caso las acciones a realizar son:"); ?>
<ul>
  <li><strong><?php echo __("Ver Entrada"); ?></strong><?php echo image_tag('manual/icono_lupa.png');?><?php echo __("Pulsando en el icono de Ver Entrada. Se muestran los mismos datos explicados en el apartado anterior, pero además se puede ver el informe de entrada generado.");?></li>
  <br/>
  <li><strong><?php echo __("Descargar Informe"); ?></strong><?php echo image_tag('manual/icono_pdf.png');?><?php echo __("Pulsando en el icono de Descargar Informe, podremos descargar el informe de entrada generado al procesarla. En él se muestran los datos del conductor, empresa, número de entrada y los artículos ubicados con su lote y ubicación dentro del almacén.");?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'EntradasProcesadas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/EntradasProcesadas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>