<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Familias'),'/familias/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Familia'),'/familias/agregarFamilia'); ?></div>
</div>
<div id="tituloTabla">
  <?php echo __("BORRANDO FAMILIA"); ?>
</div>
<table class='centrarTablas'>
	<thead>
		<tr>
			<td colspan='2'><?php echo __("Borrar Familia"); ?></td>
		</tr>
	</thead>
	<tr><td><?php echo $msg; ?></td></tr>
	<tr><td colspan='2'><?php echo button_to('Volver','familias/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
</table>