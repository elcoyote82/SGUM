<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Contactos'),'/contactos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Proveedores'),'/contactos/administrarContactosProveedores'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Clientes'),'/contactos/administrarContactosClientes'); ?></div>
</div>
<div id="tituloTabla">
  <?php echo __("BORRANDO CONTACTOS"); ?>
</div>
<table class='centrarTablas'>
	<thead>
		<tr>
			<td colspan='2'><?php echo __("Borrar Contacto"); ?></td>
		</tr>
	</thead>
	<tr><td><?php echo $msg; ?></td></tr>
	<tr><td colspan='2'><?php echo button_to('Volver','contactos/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
</table>