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
	<?php echo __("AGREGANDO CONDUCTOR"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/transporte/agregarTransporteConductor'); ?>
	<table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Agregar Conductor"); ?></td>
          </tr>
        </thead>
        <tr>
			<td align="left">
				<strong><?php echo __("Nombre: "); ?></strong>
			</td><td>
				<?php echo form_error('nombre'); ?>		
				<?php echo input_tag('nombre',''); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Apellidos: "); ?></strong>
			</td><td>
				<?php echo form_error('apellidos'); ?>		
				<?php echo input_tag('apellidos',''); ?>
				<br />
			</td>
		</tr>			
		<tr>
			<td align="left">
				<strong><?php echo __("Empresa: "); ?></strong>
			</td>
			<td> 
				<?php if($empresa_error != ''): ?>
					<div class="form_error"><?php echo $empresa_error; ?></div>
				<?php endif; ?>
				<br />
				<?php echo select_tag('transporte_empresa',options_for_select($ar_transporte_empresas,$id_transporte_empresa)); ?>
				<div id='transporte_empresa_nombre'>
					<a href="javascript:mostrar_submenu('submenu_1');"><?php echo "nueva empresa"; ?></a>
				</div>
			</td>
		</tr>
		<?php if ($empresa_nueva != ''): ?>
			<tr id='submenu_1' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_1' style='display:none'>
		<?php endif; ?>
			<td>
				<strong><?php echo __("Empresa Nueva: "); ?></strong>
			</td>
			<td><?php echo input_tag('empresa_nueva',$empresa_nueva); ?></td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Teléfono: "); ?></strong>
			</td>
			<td>		
				<?php echo input_tag('telefono',''); ?>
				<div id='categoria_nombre'>
				  <a href="javascript:mostrar_submenu('submenu_contacto_trabajo');"><?php echo image_tag('phone.png'); ?></a>
				  <a href="javascript:mostrar_submenu('submenu_contacto_otro');"><?php echo image_tag('house.png'); ?></a>
				</div>
			</td>
		</tr>
		<?php if ($telefono_trabajo != ''): ?>
			<tr id='submenu_contacto_trabajo' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_contacto_trabajo' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Teléfono Trabajo: "); ?></strong>
			</td><td>		
				<?php echo input_tag('telefono_trabajo',''); ?>
			</td>
		</tr>
		<?php if ($telefono_otro != ''): ?>
			<tr id='submenu_contacto_otro' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_contacto_otro' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Teléfono Otro: "); ?></strong>
			</td><td>		
				<?php echo input_tag('telefono_otro',''); ?>
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Móvil: "); ?></strong>
			</td><td>		
				<?php echo input_tag('movil',''); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Observaciones: "); ?></strong>
			</td><td>
				<?php echo textarea_tag('observaciones', '',array('size=5x5')) ?>
				<br />
			</td>
		</tr>
		<tr>
			<td>
				<?php echo button_to(__('Cancelar'),'transporte/index',array('class'  => 'buttonEsqueleto2')) ?>
			</td>
			<td>
				<?php echo submit_tag(__('Guardar'),array('class'  => 'buttonEsqueleto2')); ?>
			</td>
		</tr>
	  </table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("Agregar Contacto"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Agregar Otro','/transporte/agregarTransporteConductor',array('class' => 'buttonEsqueleto2')); ?></td>
			<td><?php echo button_to('Volver','transporte/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>