<?php echo __("Disponemos de un buscador, con él podremos filtrar a las empresas de transporte por diferentes criterios. Elegimos el criterio y hacemos clic en Buscar. Si existen resultados se mostrarán por pantalla. Si hacemos clic en Restablecer nos muestra todos los empresas disponibles, restablece la búsqueda.
		Los criterios de búsqueda que podemos elegir son los siguientes:	
		")?>
 <ul>
	<li>
		<?php echo __("<b>Por Nombre</b>: según el nombre de la empresa de transporte.")?>
	</li>
	<li>
		<?php echo __("<b>Por CIF/NIF</b>: según el CIF o el NIF de la empresa de transporte.")?>
	</li>
	<li>
		<?php echo __("<b>Por País</b>: según el país de la empresa de transporte.")?>
	</li>
	<li>
		<?php echo __("<b>Por Provincia</b>: según la provincia de la empresa de transporte, esta opción únicamente si se trata de una empresa ubicada en España.")?>
	</li>
	<li>
		<?php echo __("<b>Por Fecha de Creación</b>: según la fecha de creación de la empresa de transporte.")?>
	</li>
</ul>

<?php $imagen_tam = getimagesize(sfConfig::get('app_imagenes_manual_usuario').'BuscadorTransporteEmpresas.jpg'); ?>
<div id="imagenAyuda">
	<?php echo image_tag('manual/BuscadorTransporteEmpresas.jpg',array('size' => '700x'.($imagen_tam[1]*700)/$imagen_tam[0])); ?>
</div>