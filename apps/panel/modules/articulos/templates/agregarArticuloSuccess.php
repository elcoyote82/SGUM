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

<!-- Para seleccionar no o yes en los radio button -->
<?php echo javascript_tag("
   function radio_no(campo)  
{    
	campo.disabled=false;
	campo.disabled=true;
}
")?>

<!-- Para seleccionar no o yes en los radio button -->
<?php echo javascript_tag("
   function radio_yes(campo)  
{    
	campo.disabled=true;
	campo.disabled=false;
}
")?>

<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Artículos'),'/articulos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Familias'),'/familias/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ubicaciones'),'/ubicaciones/index'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("AGREGANDO NUEVO ARTÍCULO"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/articulos/agregarArticulo','method=POST enctype=multipart/form-data'); ?>
		<table class="centrarTablas">
			<thead>
				<tr><td colspan='2' align="center"><?php echo __("Agregar Artículo"); ?></td></tr>
			</thead>
			<tr>
				<td>
					<strong><?php echo __("Nombre: "); ?></strong>
				</td>
				<td>
					<?php echo form_error('nombre'); ?>		
					<?php echo input_tag('nombre',''); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong><?php echo __("Familia: "); ?></strong>
				</td>
				<td>
					<?php echo form_error('id_familia'); ?>		
					<?php echo select_tag('id_familia',options_for_select($ar_familias,$id_familia)); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong><?php echo __("Datos Producto: "); ?></strong>
				</td>
				<td>	
					<?php echo input_tag('datos_producto',''); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong><?php echo __("Descripción: "); ?></strong>
				</td>
				<td>	
					<?php echo textarea_tag('descripcion',''); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong><?php echo __("Aviso Mínimo: "); ?></strong>
				</td>
				<td>					
					<?php echo radiobutton_tag('aviso_minimo', '0',$aviso_minimo == '0',array('onclick' => 'radio_no(stock_minimo)')).__("No");?>
					<?php echo radiobutton_tag('aviso_minimo', '1',$aviso_minimo == '1',array('onclick' => 'radio_yes(stock_minimo)')).__("Sí");?>
				</td>
			</tr>
			<tr>
				<td>					
					<strong><?php echo __("Stock Mínimo: "); ?></strong>
				</td>
				<td>					
					<div class='form_error'><?php if($error_stock_minimo) : echo $error_stock_minimo; endif; ?></div>
					<?php if($aviso_minimo != '1'): ?>					
						<?php echo input_tag('stock_minimo',$stock_minimo,array('size' => 2,'disabled'=>true)); ?>									
					<?php else: ?>
						<?php echo input_tag('stock_minimo',$stock_minimo,array('size' => 2)); ?>					
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong><?php echo __("Proveedor: "); ?></strong>
				</td>
				<td>
					<div class='form_error'><?php if($error_id_proveedor) : echo $error_id_proveedor; endif; ?></div>
					<?php echo select_tag('id_proveedor',options_for_select($ar_proveedores,$id_proveedor), array('multiple' => true)); ?>
				</td>
			</tr>
			<tr>
				<td align='left'><strong><?php echo __("Imagen: "); ?></strong></td>
				<td align='left'>	
					<?php echo input_file_tag('imagen'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo button_to('Cancelar','articulos/index',array('class' => 'buttonEsqueleto2')); ?>
				</td>
				<td  align='center'>
						<?php echo submit_tag(__('Guardar'),array('class'  => 'buttonEsqueleto2')); ?>
				</td>
			</tr>
		</table>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("AGREGANDO ARTÍCULO"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Volver','articulos/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>