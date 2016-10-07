<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Conductores'),'/transporte/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Conductor'),'/transporte/agregarTransporteConductor'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Empresas de Transporte'),'/transporte/administrarTransporteEmpresas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Empresa'),'/transporte/agregarTransporteEmpresa'); ?></div>
</div>
<div id="tituloTabla">
  <?php echo __("BORRANDO EMPRESA DE TRANSPORTE"); ?>
</div>
<table class='centrarTablas'>
	<thead>
		<tr>
			<td colspan='2'><?php echo __("Borrar Empresa de Transporte"); ?></td>
		</tr>
	</thead>
	<tr><td><?php echo $msg; ?></td></tr>
	<tr><td colspan='2'><?php echo button_to('Volver','transporte/administrarTransporteEmpresas',array('class' => 'buttonEsqueleto2')); ?></td></tr>
</table>