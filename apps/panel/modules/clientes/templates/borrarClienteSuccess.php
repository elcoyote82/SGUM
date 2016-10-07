<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Clientes'),'/clientes/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Cliente'),'/clientes/agregarCliente'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Clientes'),'/contactos/administrarContactosClientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Contacto'),'/contactos/agregarContacto?opcion=clientes'); ?></div>
</div>
<div id="tituloTabla">
  <?php echo __("BORRANDO CLIENTES"); ?>
</div>
<table class='centrarTablas'>
	<thead>
		<tr>
			<td colspan='2'><?php echo __("Borrar Cliente"); ?></td>
		</tr>
	</thead>
	<tr><td><?php echo $msg; ?></td></tr>
	<tr><td colspan='2'><?php echo button_to('Volver','clientes/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
</table>