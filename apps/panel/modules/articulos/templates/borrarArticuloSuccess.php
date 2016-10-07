<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Artículos'),'/articulos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Familias'),'/familias/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ubicaciones'),'/ubicaciones/index'); ?></div>
</div>
<div id="tituloTabla">
  <?php echo __("BORRANDO ARTÍCULOS"); ?>
</div>
<table class='centrarTablas'>
	<thead>
		<tr>
			<td colspan='2'><?php echo __("Borrar Artículo"); ?></td>
		</tr>
	</thead>
	<tr><td><?php echo $msg; ?></td></tr>
	<tr><td colspan='2'><?php echo button_to('Volver','articulos/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
</table>