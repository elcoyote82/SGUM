<!-- Ocultar y mostrar el contenido de un submenu cuando hacemos clic en un enlace -->
<?php echo javascript_tag("
  function mostrar_submenu(fila){
  status =document.getElementById(fila).style.display;
  if(status=='none'){
      document.getElementById(fila).style.display=\"table-row\";
   }else{
  	 document.getElementById(fila).style.display=\"none\";
   }
}

") ?>

<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Clientes'),'/clientes/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Cliente'),'/clientes/agregarCliente'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Clientes'),'/contactos/administrarContactosClientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Contacto'),'/contactos/agregarContacto?opcion=clientes'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("EDITANDO CLIENTE"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/clientes/editarCliente'); ?>	
	<?php echo input_hidden_tag('id_md5_cliente',$id_md5_cliente); ?>     
	<table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Editar Cliente"); ?></td>
          </tr>
        </thead>
        <tr>
			<td><?php echo __("<strong>Nombre:</strong>"); ?></td>
			<td>
				<?php echo form_error('nombre'); ?>
				<?php echo input_tag('nombre',$obj_cliente->getNombre(),'size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>CIF/NIF:</strong>"); ?></td>
			<td>
				<?php echo form_error('cif_nif'); ?>
				<?php if($sf_request->hasError('cif_nif')): ?>
					<?php if($acc_utilidades->comprobar_nif_cif_nie($cif_nif) == -1): ?>
						<?php $letra = $acc_utilidades->obtenerLetraNIF($cif_nif);?>
						<div class="form_error" >
					    	<?php echo "&darr;El NIF es incorrecto, quizás quiso escribir la letra '".$letra."' &darr;";	 ?>
					    </div>
					<?php elseif($acc_utilidades->comprobar_nif_cif_nie($cif_nif) == -2): ?>					
						<?php $letra = $acc_utilidades->obtenerDigitoControlCIF($cif_nif);?>
						<div class="form_error" >
				    		<?php echo "&darr;El CIF es incorrecto, quizás quiso escribir como número de control '".$letra."' &darr;";	 ?>
				    	</div>
					<?php endif; ?>
				<?php endif; ?>
				<?php echo input_tag('cif_nif',$obj_cliente->getCifNif(),'size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Dirección:</strong>"); ?></td>
			<td>
				<?php echo form_error('direccion'); ?>
				<?php echo input_tag('direccion',$obj_cliente->getDireccion(),'size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Población:</strong>"); ?></td>
			<td>
				<?php echo form_error('poblacion'); ?>
				<?php echo input_tag('poblacion',$obj_cliente->getPoblacion(),'size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Provincia:</strong>"); ?></td>
			<td>
				<?php echo form_error('provincia'); ?>
				<?php echo select_tag('provincia',options_for_select($ar_provincias,$obj_cliente->getProvincia())); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>C.P.:</strong>"); ?></td>
			<td>
				<?php echo form_error('cp'); ?>
				<?php echo input_tag('cp',$obj_cliente->getCp(),'size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>País:</strong>"); ?></td>
			<td>
				<?php echo form_error('pais'); ?>
				<?php echo select_country_tag('pais',$obj_cliente->getPais()); ?>
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Teléfono: "); ?></strong>
			</td><td>		
				<?php echo form_error('telefono'); ?>
				<?php echo input_tag('telefono',$obj_cliente->getTelefono()); ?>
				<div id='categoria_nombre'>
				  <a href="javascript:mostrar_submenu('submenu_telefono2');"><?php echo image_tag('phone.png'); ?></a>
				</div>
			</td>
		</tr>
		<?php if ($telefono2 != '' || $obj_cliente->getTelefono2() != ''): ?>
			<tr id='submenu_telefono2' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_telefono2' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Otro Teléfono: "); ?></strong>
			</td>
			<td>
				<?php if ($telefono2 != $obj_cliente->getTelefono2()): ?>		
					<?php echo input_tag('telefono2',$telefono2); ?>
				<?php else: ?>
					<?php echo input_tag('telefono2',$obj_cliente->getTelefono2()); ?>
				<?php endif; ?>				
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Móvil:</strong>"); ?></td>
			<td>
				<?php echo form_error('movil'); ?>
				<?php echo input_tag('movil',$obj_cliente->getMovil(),'size=50x10'); ?>
			</td>
		</tr>	
        <tr>
			<td><?php echo __("<strong>Fax:</strong>"); ?></td>
			<td>
				<?php echo form_error('fax'); ?>
				<?php echo input_tag('fax',$obj_cliente->getFax(),'size=50x10'); ?>
			</td>
		</tr>	
        <tr>
			<td><?php echo __("<strong>Email:</strong>"); ?></td>
			<td>
				<?php echo form_error('email'); ?>
				<?php echo input_tag('email',$obj_cliente->getEmail(),'size=50x10'); ?>
			</td>
		</tr>	
        <tr>
			<td><?php echo __("<strong>Web:</strong>"); ?></td>
			<td>
				<?php echo form_error('web'); ?>
				<?php echo input_tag('web',$obj_cliente->getWeb(),'size=50x10'); ?>
			</td>
		</tr>		
		<tr>
			<td>
				<?php echo button_to(__('Cancelar'),'clientes/index',array('class'  => 'buttonEsqueleto2')) ?>
			</td>
			<td>
				<?php echo submit_tag(__('Actualizar'),array('class'  => 'buttonEsqueleto2')); ?>
			</td>
		</tr>
	  </table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("Editar Cliente"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Volver','clientes/index',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>