<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Ubicaciones'),'/ubicaciones/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Ubicación'),'/ubicaciones/agregarUbicacion'); ?></div>
</div>
<div id="tituloTabla">
  <?php echo __("BORRANDO UBICACIÓN"); ?>
</div>
<table class='centrarTablas'>
	<thead>
		<tr>
			<td colspan='2'><?php echo __("Borrar Ubicación"); ?></td>
		</tr>
	</thead>
	<tr><td><?php echo $msg; ?></td></tr>
	<tr><td colspan='2'><?php echo button_to('Volver','ubicaciones/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
</table>