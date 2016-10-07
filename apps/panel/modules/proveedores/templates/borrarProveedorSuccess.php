<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Proveedores'),'/proveedores/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Proveedor'),'/proveedores/agregarProveedor'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Contactos Proveedores'),'/contactos/administrarContactosProveedores'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Contacto'),'/contactos/agregarContacto?opcion=proveedores'); ?></div>
</div>
<div id="tituloTabla">
  <?php echo __("BORRANDO PROVEEDORES"); ?>
</div>
<table class='centrarTablas'>
	<thead>
		<tr>
			<td colspan='2'><?php echo __("Borrar Proveedor"); ?></td>
		</tr>
	</thead>
	<tr><td><?php echo $msg; ?></td></tr>
	<tr><td colspan='2'><?php echo button_to('Volver','proveedores/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
</table>