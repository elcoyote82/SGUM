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
	<div class='botonSubNav'><?php echo link_to(__('Contactos'),'/contactos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Proveedores'),'/contactos/administrarContactosProveedores'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Clientes'),'/contactos/administrarContactosClientes'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("EDITANDO CONTACTO"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/contactos/editarContacto'); ?>	
	<?php echo input_hidden_tag('id_md5_contacto',$id_md5_contacto); ?>
	<?php echo input_hidden_tag('opcion',$opcion); ?>      
	<table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Editar Contacto"); ?></td>
          </tr>
        </thead>
        <tr>
			<td align="left">
				<strong><?php echo __("Nombre: "); ?></strong>
			</td><td>
				<?php echo form_error('nombre'); ?>		
				<?php echo input_tag('nombre',$obj_contacto->getNombre()); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Apellidos: "); ?></strong>
			</td><td>
				<?php echo form_error('apellidos'); ?>		
				<?php echo input_tag('apellidos',$obj_contacto->getApellidos()); ?>
				<br />
			</td>
		</tr>			
		<?php if($opcion == "proveedores"):?>
			<tr>
				<td align="left"><?php echo __("<strong>Proveedores:</strong>"); ?></td>
				<td>
					<?php echo form_error('id_contactado'); ?>
					<?php echo select_tag('id_contactado',options_for_select($ar_proveedores,$obj_contacto->getIdContactado())); ?>
				</td>
			</tr>
		<?php else: ?>
			<tr>
				<td align="left"><?php echo __("<strong>Clientes:</strong>"); ?></td>
				<td>
					<?php echo form_error('id_contactado'); ?>
					<?php echo select_tag('id_contactado',options_for_select($ar_clientes,$obj_contacto->getIdContactado())); ?>
				</td>
			</tr>
		<?php endif; ?>
		<?php echo observe_field('id_contactado', array(
		  'update'   => 'id_jefe',
		  'url'      => 'contactos/obtenerJefe',
		  'script'   => 'true',
		  'with'     => "'id_contactado=' + value+'&opcion=$opcion'"
		)) ?>
		<tr>
			<td align="left">
				<strong><?php echo __("Direccion: "); ?></strong>
			</td><td>		
				<?php echo input_tag('direccion',$obj_contacto->getDireccion()); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("CP: "); ?></strong>
			</td><td>		
				<?php echo input_tag('cp',$obj_contacto->getCp()); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Localidad: "); ?></strong>
			</td><td>		
				<?php echo input_tag('localidad',$obj_contacto->getLocalidad()); ?>
				<br />
			</td>
		</tr>
        <tr>
			<td align="left"><?php echo __("<strong>Provincia:</strong>"); ?></td>
			<td>
				<?php echo form_error('provincia'); ?>
				<?php echo select_tag('provincia',options_for_select($ar_provincias,$obj_contacto->getProvincia())); ?>
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("País: "); ?></strong>
			</td><td>		
				<?php echo input_tag('pais',$obj_contacto->getPais()); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Teléfono: "); ?></strong>
			</td><td>		
				<?php echo input_tag('telefono',$obj_contacto->getTelefono()); ?>
				<div id='categoria_nombre'>
				  <a href="javascript:mostrar_submenu('submenu_contacto_trabajo');"><?php echo image_tag('phone.png'); ?></a>
				  <a href="javascript:mostrar_submenu('submenu_contacto_otro');"><?php echo image_tag('house.png'); ?></a>
				</div>
			</td>
		</tr>
		<?php if ($telefono_trabajo != '' || $obj_contacto->getTelefonoTrabajo() != ''): ?>
			<tr id='submenu_contacto_trabajo' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_contacto_trabajo' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Teléfono Trabajo: "); ?></strong>
			</td>
			<td>
				<?php if ($telefono_trabajo != $obj_contacto->getTelefonoTrabajo()): ?>		
					<?php echo input_tag('telefono_trabajo',$telefono_trabajo); ?>
				<?php else: ?>
					<?php echo input_tag('telefono_trabajo',$obj_contacto->getTelefonoTrabajo()); ?>
				<?php endif; ?>				
			</td>
		</tr>
		<?php if ($telefono_otro != '' || $obj_contacto->getTelefonoOtro() != ''): ?>
			<tr id='submenu_contacto_otro' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_contacto_otro' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Teléfono Otro: "); ?></strong>
			</td>
			<td>
				<?php if ($telefono_otro != $obj_contacto->getTelefonoOtro()): ?>		
					<?php echo input_tag('telefono_otro',$telefono_otro); ?>
				<?php else: ?>
					<?php echo input_tag('telefono_otro',$obj_contacto->getTelefonoOtro()); ?>
				<?php endif; ?>				
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Móvil: "); ?></strong>
			</td><td>		
				<?php echo input_tag('movil',$obj_contacto->getMovil()); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Fax: "); ?></strong>
			</td><td>		
				<?php echo input_tag('fax',$obj_contacto->getFax()); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Email: "); ?></strong>
			</td><td>		
				<?php echo input_tag('email',$obj_contacto->getEmail()); ?>
				<a href="javascript:mostrar_submenu('submenu_email2');"><?php echo image_tag('mas.png'); ?></a>
			</td>
		</tr>			
		<?php if ($email_2 != '' || $obj_contacto->getEmailDos() != ''): ?>
			<tr id='submenu_email2' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_email2' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Email 2: "); ?></strong>
			</td>
			<td>
				<?php if ($email_2 != $obj_contacto->getEmailDos()): ?>		
					<?php echo input_tag('email_2',$email_2); ?>
				<?php else: ?>
					<?php echo input_tag('email_2',$obj_contacto->getEmailDos()); ?>
					<a href="javascript:mostrar_submenu('submenu_email3');"><?php echo image_tag('mas.png'); ?></a>
				<?php endif; ?>				
			</td>
		</tr>
		<?php if ($email_3 != '' || $obj_contacto->getEmailTres() != ''): ?>
			<tr id='submenu_email3' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_email3' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Email 3: "); ?></strong>
			</td>
			<td>
				<?php if ($email_3 != $obj_contacto->getEmailTres()): ?>		
					<?php echo input_tag('email_3',$email_3); ?>
				<?php else: ?>
					<?php echo input_tag('email_3',$obj_contacto->getEmailTres()); ?>
				<?php endif; ?>				
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Puesto: "); ?></strong>
			</td><td>		
				<?php echo input_tag('puesto',$obj_contacto->getPuesto()); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Jefe: "); ?></strong>
			</td><td> 
				<?php if($obj_contacto->getIdJefe()): ?>
					<?php echo select_tag('id_jefe',options_for_select($ar_jefes,$obj_contacto->getIdJefe())); ?>
				<?php else:?>
					<div id='id_jefe'></div>
				<?php endif; ?>
							
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Observaciones: "); ?></strong>
			</td><td>
				<?php echo textarea_tag('observaciones', $obj_contacto->getObservaciones(),array('size=5x5')) ?>
				<br />
			</td>
		</tr>
		<tr>
			<td>
				<?php echo button_to(__('Cancelar'),'contactos/index',array('class'  => 'buttonEsqueleto2')) ?>
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
				<td><?php echo __("Editar Contacto"); ?></td>
			</tr>
		</thead>
		<tr><td align='center'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Volver','contactos/index',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>