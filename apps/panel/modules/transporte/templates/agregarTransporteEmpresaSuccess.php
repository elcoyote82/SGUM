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
	<?php echo __("AGREGANDO EMPRESA DE TRANSPORTE"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/transporte/agregarTransporteEmpresa'); ?>    
	<table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Agregar Empresa de Transporte"); ?></td>
          </tr>
        </thead>
        <tr>
			<td><?php echo __("<strong>Nombre:</strong>"); ?></td>
			<td>
				<?php echo form_error('nombre'); ?>
				<?php echo input_tag('nombre','','size=50x10'); ?>
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
				<?php echo input_tag('cif_nif','','size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Dirección:</strong>"); ?></td>
			<td>
				<?php echo form_error('direccion'); ?>
				<?php echo input_tag('direccion','','size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Población:</strong>"); ?></td>
			<td>
				<?php echo form_error('poblacion'); ?>
				<?php echo input_tag('poblacion','','size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Provincia:</strong>"); ?></td>
			<td>
				<?php echo form_error('provincia'); ?>
				<?php echo select_tag('provincia',options_for_select($ar_provincias,$provincia)); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>C.P.:</strong>"); ?></td>
			<td>
				<?php echo form_error('cp'); ?>
				<?php echo input_tag('cp','','size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>País:</strong>"); ?></td>
			<td>
				<?php echo form_error('pais'); ?>
				<?php echo select_country_tag('pais',$pais); ?>
			</td>
		</tr>
       <tr>
			<td>
				<strong><?php echo __("Teléfono: "); ?></strong>
			</td>
			<td>
				<?php echo form_error('telefono'); ?>		
				<?php echo input_tag('telefono',''); ?>
				<div id='categoria_nombre'>
				  <a href="javascript:mostrar_submenu('submenu_telefono2');"><?php echo image_tag('phone.png'); ?></a>
				</div>
			</td>
		</tr>
		<?php if ($telefono2 != ''): ?>
			<tr id='submenu_telefono2' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_telefono2' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Otro Teléfono: "); ?></strong>
			</td><td>		
				<?php echo input_tag('telefono2',''); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Móvil:</strong>"); ?></td>
			<td>
				<?php echo form_error('movil'); ?>
				<?php echo input_tag('movil','','size=50x10'); ?>
			</td>
		</tr>	
        <tr>
			<td><?php echo __("<strong>Fax:</strong>"); ?></td>
			<td>
				<?php echo form_error('fax'); ?>
				<?php echo input_tag('fax','','size=50x10'); ?>
			</td>
		</tr>	
        <tr>
			<td><?php echo __("<strong>Email:</strong>"); ?></td>
			<td>
				<?php echo form_error('email'); ?>
				<?php echo input_tag('email','','size=50x10'); ?>
			</td>
		</tr>	
        <tr>
			<td><?php echo __("<strong>Web:</strong>"); ?></td>
			<td>
				<?php echo form_error('web'); ?>
				<?php echo input_tag('web','','size=50x10'); ?>
			</td>
		</tr>		
		<tr>
			<td>
				<?php echo button_to(__('Cancelar'),'transporte/administrarTransporteEmpresas',array('class'  => 'buttonEsqueleto2')) ?>
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
				<td colspan='2'><?php echo __("Agregar Empresa de Transporte"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Agregar Otro','/transporte/agregarTransporteEmpresa',array('class' => 'buttonEsqueleto2')); ?></td>
			<td><?php echo button_to('Volver','transporte/administrarTransporteEmpresas',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>