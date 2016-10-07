<?php echo __("El listado de ubicaciones nos muestra cómo está almacenado nuestro almacén. Nosotros hemos usado el siguiente ejemplo de codificación de estanterías para nuestra aplicación SGUM, es posible modificarlo."); ?>
<ul>
	<li><?php echo __("<b>Primer dígito:</b> Letra mayúscula representado el lugar que ocupa la estantería en el conjunto total. Las estanterías se nombrarán con una letra consecutiva del abecedario empezando de derecha a izquierda. Por ejemplo la estantería más cercana a las oficinas será la “A” y su compañera la “B” y así sucesivamente.")?></li>
	<li><?php echo __("<b>Segundo dígito:</b> Es el número de posición que ocupa la mercancía en la estantería. Empezando a numera de abajo arriba, considerando abajo el hueco más cercano al muelle de descarga.")?></li>
	<li><?php echo __("<b>Tercer dígito:</b> El nivel de altura al que se puede ubicar una mercancía. En nuestro ejemplo tendremos 3 niveles como máximo.")?></li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'VerUbicaciones.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/VerUbicaciones.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>

<?php echo __("Indicar que podemos ordenar alfabéticamente la columna de las ubicaciones pulsando sobre ella."); ?>