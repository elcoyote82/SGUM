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
	<?php echo __("AGREGANDO CONTACTO"); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/contactos/agregarContacto'); ?>
	<?php echo input_hidden_tag('opcion',$opcion); ?>    
	<table class='centrarTablas'>
        <thead>
          <tr>
            <td colspan='2'><?php echo __("Agregar Contacto"); ?></td>
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
		<?php if($opcion == "proveedores"):?>
			<tr>
				<td align="left"><?php echo __("<strong>Proveedores:</strong>"); ?></td>
				<td>
					<?php echo form_error('id_contactado'); ?>
					<?php echo select_tag('id_contactado',options_for_select($ar_proveedores,$id_contactado)); ?>
				</td>
			</tr>
		<?php else: ?>
			<tr>
				<td align="left"><?php echo __("<strong>Clientes:</strong>"); ?></td>
				<td>
					<?php echo form_error('id_contactado'); ?>
					<?php echo select_tag('id_contactado',options_for_select($ar_clientes,$id_contactado)); ?>
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
				<?php echo input_tag('direccion',''); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("CP: "); ?></strong>
			</td><td>		
				<?php echo input_tag('cp',''); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Localidad: "); ?></strong>
			</td><td>		
				<?php echo input_tag('localidad',''); ?>
				<br />
			</td>
		</tr>
        <tr>
			<td align="left"><?php echo __("<strong>Provincia:</strong>"); ?></td>
			<td>
				<?php echo select_tag('provincia',options_for_select($ar_provincias,$provincia)); ?>
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("País: "); ?></strong>
			</td><td>		
				<?php echo input_tag('pais',''); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Extensión: "); ?></strong>
			</td>
			<td>
				<?php echo input_tag('ext_telefono','','size=3'); ?>
			</td>
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
				<strong><?php echo __("Fax: "); ?></strong>
			</td><td>		
				<?php echo input_tag('fax',''); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Email: "); ?></strong>
			</td>
			<td>	
				<?php echo form_error('email'); ?>	
				<?php echo input_tag('email',''); ?>
				<a href="javascript:mostrar_submenu('submenu_email2');"><?php echo image_tag('mas.png'); ?></a>
			</td>
		</tr>
		<?php if ($email_2 != ''): ?>
			<tr id='submenu_email2' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_email2' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Email 2"); ?></strong>
			</td>
			<td>
				<?php echo form_error('email_2'); ?>		
				<?php echo input_tag('email_2',''); ?>
				<a href="javascript:mostrar_submenu('submenu_email3');"><?php echo image_tag('mas.png'); ?></a>
			</td>
		</tr>
		<?php if ($email_3 != ''): ?>
			<tr id='submenu_email3' style='display:visible'>
		<?php else: ?>
			<tr id='submenu_email3' style='display:none'>
		<?php endif; ?>
			<td align="left">
				<strong><?php echo __("Email 3"); ?></strong>
			</td>
			<td>
				<?php echo form_error('email_3'); ?>		
				<?php echo input_tag('email_3',''); ?>
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Puesto: "); ?></strong>
			</td><td>		
				<?php echo input_tag('puesto',''); ?>
				<br />
			</td>
		</tr>
		<tr>
			<td align="left">
				<strong><?php echo __("Jefe: "); ?></strong>
			</td><td> 
				<div id='id_jefe'></div>
			
			</td>			
			<?php echo observe_field('id_jefe', array(
			  'update'   => 'id_jefe',
			  'url'      => 'contactos/obtenerJefe',
			  'script'   => 'true',
			  'with'     => "'id_jefe=' + value"
			)) ?>
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
				<?php echo button_to(__('Cancelar'),'contactos/index',array('class'  => 'buttonEsqueleto2')) ?>
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
			<td><?php echo button_to('Agregar Otro','/contactos/agregarContacto?opcion='.$opcion,array('class' => 'buttonEsqueleto2')); ?></td>
			<td><?php echo button_to('Volver','contactos/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>