<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Ubicaciones'),'/ubicaciones/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Ubicación'),'/ubicaciones/agregarUbicacion'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("EDITANDO UBICACIÓN"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/ubicaciones/editarUbicacion'); ?>	
	<?php echo input_hidden_tag('id_md5_ubicacion',$id_md5_ubicacion); ?>     
	<table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Editar Ubicación"); ?></td>
          </tr>
        </thead>
        <tr>
			<td><?php echo __("<strong>Nombre:</strong>"); ?></td>
			<td>
				<?php echo form_error('nombre'); ?>
				<?php echo input_tag('nombre',$obj_ubicacion->getNombre(),'size=50x10'); ?>
			</td>
		</tr>
        <tr>
			<td><?php echo __("<strong>Estado:</strong>"); ?></td>
			<td>
				<?php echo select_tag('id_estado_ubicacion', options_for_select($ar_estado_ubicaciones,$obj_ubicacion->getIdEstadoUbicacion()))." %"; ?>
			</td>
		</tr>		
		<tr>
			<td>
				<?php echo button_to(__('Cancelar'),'ubicaciones/index',array('class'  => 'buttonEsqueleto2')) ?>
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
				<td colspan='2'><?php echo __("Editar Ubicación"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Volver','ubicaciones/index',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>