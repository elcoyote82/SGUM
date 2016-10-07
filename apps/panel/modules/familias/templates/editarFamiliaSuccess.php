<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Familias'),'/familias/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Familia'),'/familias/agregarFamilia'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("EDITANDO FAMILIA"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/familias/editarFamilia'); ?>	
	<?php echo input_hidden_tag('id_md5_familia',$id_md5_familia); ?>     
	<table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Editar Familia"); ?></td>
          </tr>
        </thead>
        <tr>
			<td><?php echo __("<strong>Nombre:</strong>"); ?></td>
			<td>
				<?php echo form_error('nombre'); ?>
				<?php echo input_tag('nombre',$obj_familia->getNombre(),'size=50x10'); ?>
			</td>
		</tr>	
		<tr>
			<td>
				<?php echo button_to(__('Cancelar'),'familias/index',array('class'  => 'buttonEsqueleto2')) ?>
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
				<td colspan='2'><?php echo __("Editar Familia"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Volver','familias/index',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>