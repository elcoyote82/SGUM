<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Ubicaciones'),'/ubicaciones/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Ubicación'),'/ubicaciones/agregarUbicacion'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("AGREGANDO UBICACIÓN"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/ubicaciones/agregarUbicacion'); ?>    
	<table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Agregar Ubicación"); ?></td>
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
			<td>
				<?php echo button_to(__('Cancelar'),'ubicaciones/index',array('class'  => 'buttonEsqueleto2')) ?>
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
				<td colspan='2'><?php echo __("Agregar Ubicación"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Agregar Otra','/ubicaciones/agregarUbicacion',array('class' => 'buttonEsqueleto2')); ?></td>
			<td><?php echo button_to('Volver','ubicaciones/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>