<ul>
<?php foreach ($ubicaciones as $ubicacion): ?>
	<?php if (strncasecmp($ubicacion->getNombre(),$nombre_ubicacion,strlen($nombre_ubicacion))==0): ?>
		<li id='auto'><?php echo $ubicacion->getNombre(); ?></li>
	<?php endif; ?>
<?php endforeach; ?>
</ul>