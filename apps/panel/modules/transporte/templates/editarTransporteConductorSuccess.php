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
	<div class='botonSubNav'><?php echo link_to(__('Conductores'),'/transporte/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Conductor'),'/transporte/agregarTransporteConductor'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Empresas de Transporte'),'/transporte/administrarTransporteEmpresas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Empresa'),'/transporte/agregarTransporteEmpresa'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("EDITANDO CONDUCTOR"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/transporte/editarTransporteConductor'); ?>
	<?php echo input_hidden_tag('id_md5_transporte_conductor',$id_md5_transporte_conductor); ?>
	<table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Editar Conductor"); ?></td>
          </tr>
        </thead>
        <tr>
			<td align="left">
				<strong><?php echo __("Nombre: "); ?></strong>
			</td><td>
				<?php echo form_error('nombre'); ?>		
				<?php echo input_tag('nombre',$obj_transporte_conductor->getNombre()); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Apellidos: "); ?></strong>
			</td><td>
				<?php echo form_error('apellidos'); ?>		
				<?php echo input_tag('apellidos',$obj_transporte_conductor->getApellidos()); ?>
				<br />
			</td>
		</tr>			
		<tr>
			<td align="left">
				<strong><?php echo __("Empresa: "); ?></strong>
			</td>
			<td> 
				<?php echo form_error('id_transporte_empresa'); ?>
				<?php echo select_tag('id_transporte_empresa',options_for_select($ar_transporte_empresas,$obj_transporte_conductor->getIdtransporteEmpresa())); ?>				
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Teléfono: "); ?></strong>
			</td>
			<td>		
				<?php echo input_tag('telefono',$obj_transporte_conductor->getTelefono()); ?>
				<div id='categoria_nombre'>
				  <a href="javascript:mostrar_submenu('submenu_contacto_trabajo');"><?php echo image_tag('phone.png'); ?></a>
				  <a href="javascript:mostrar_submenu('submenu_contacto_otro');"><?php echo image_tag('house.png'); ?></a>
				</div>
			</td>
		</tr>
		<?php if ($telefono_trabajo != '' || $obj_transporte_conductor->getTelefonoTrabajo() != ''): ?>
			<tr id='submenu_contacto_trabajo' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_contacto_trabajo' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Teléfono Trabajo: "); ?></strong>
			</td>
			<td>
				<?php if ($telefono_trabajo != $obj_transporte_conductor->getTelefonoTrabajo()): ?>		
					<?php echo input_tag('telefono_trabajo',$telefono_trabajo); ?>
				<?php else: ?>
					<?php echo input_tag('telefono_trabajo',$obj_transporte_conductor->getTelefonoTrabajo()); ?>
				<?php endif; ?>				
			</td>
		</tr>
		<?php if ($telefono_otro != '' || $obj_transporte_conductor->getTelefonoOtro() != ''): ?>
			<tr id='submenu_contacto_otro' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_contacto_otro' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Teléfono Otro: "); ?></strong>
			</td>
			<td>
				<?php if ($telefono_otro != $obj_transporte_conductor->getTelefonoOtro()): ?>		
					<?php echo input_tag('telefono_otro',$telefono_otro); ?>
				<?php else: ?>
					<?php echo input_tag('telefono_otro',$obj_transporte_conductor->getTelefonoOtro()); ?>
				<?php endif; ?>				
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Móvil: "); ?></strong>
			</td><td>		
				<?php echo input_tag('movil',$obj_transporte_conductor->getMovil()); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Observaciones: "); ?></strong>
			</td><td>
				<?php echo textarea_tag('observaciones', $obj_transporte_conductor->getObservaciones(),array('size=5x5')) ?>
				<br />
			</td>
		</tr>
		<tr>
			<td>
				<?php echo button_to(__('Cancelar'),'transporte/index',array('class'  => 'buttonEsqueleto2')) ?>
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
				<td colspan='2'><?php echo __("Actualizar Contacto"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Volver','transporte/index',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>