<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Contactos'),'/contactos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Proveedores'),'/contactos/administrarContactosProveedores'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Clientes'),'/contactos/administrarContactosClientes'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("ADMINISTRACIÓN DE CONTACTOS DE LOS CLIENTES"); ?>
	<br /><br />
	<?php echo button_to(__('Agregar Contacto'),'contactos/agregarContacto?opcion=clientes',array('class'  => 'buttonEsqueleto')); ?>
</div>
<div class='buscador_ancho'>
	<?php echo form_tag('/contactos/administrarContactosClientes'); ?>
		<?php echo __("Nombre: "); ?>
		<?php echo input_tag('nombre', $nombre) ?> 
		<?php echo __("Apellidos: "); ?>
		<?php echo input_tag('apellidos', $apellidos,'size=>50') ?>
		<?php echo __("Clientes: "); ?>
		<?php echo select_tag('id_cliente',options_for_select($ar_clientes,$id_cliente)); ?>
		<br /><br />
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'contactos/administrarContactosClientes',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Contactos Clientes"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún contacto de los clientes."); ?></td></tr>
	</table>
<?php else: ?>
<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $nombre = $acc_url->parsearEnvio($nombre); ?>
		<?php $apellidos = $acc_url->parsearEnvio($apellidos); ?>
		<?php $id_cliente = $acc_url->parsearEnvio($id_cliente); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
		<?php $sort = $acc_url->parsearEnvio($sort); ?>
		<?php $type = $acc_url->parsearEnvio($type); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'contactos/administrarContactosClientes?page='.$pager->getFirstPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'contactos/administrarContactosClientes?page='.$pager->getPreviousPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/contactos/administrarContactosClientes?page='.$page.'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'contactos/administrarContactosClientes?page='.$pager->getNextPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'contactos/administrarContactosClientes?page='.$pager->getLastPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<?php if($type == 'asc' && $sort == 'nombre_contacto'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Nombre'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_contacto&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'nombre_contacto'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Nombre'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_contacto&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Nombre'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_contacto&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'apellidos_contacto'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Apellidos'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=apellidos_contacto&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'apellidos_contacto'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Apellidos'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=apellidos_contacto&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Apellidos'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=apellidos_contacto&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'id_contactado_contacto'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Contactado'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_contactado_contacto&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'id_contactado_contacto'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Contactado'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_contactado_contacto&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Contactado'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_contactado_contacto&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'telefono_contacto'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Teléfono'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_contacto&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'telefono_contacto'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Teléfono'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_contacto&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Teléfono'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_contacto&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'fax_contacto'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Fax'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fax_contacto&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'fax_contacto'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Fax'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fax_contacto&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Fax'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fax_contacto&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'movil_contacto'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Móvil'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_contacto&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'movil_contacto'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Móvil'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_contacto&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Móvil'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_contacto&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'email_contacto'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Email'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=email_contacto&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'email_contacto'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Email'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=email_contacto&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Email'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=email_contacto&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'id_jefe_contacto'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Jefe'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_jefe_contacto&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'id_jefe_contacto'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Jefe'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_jefe_contacto&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Jefe'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_jefe_contacto&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'puesto_contacto'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Puesto'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=puesto_contacto&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'puesto_contacto'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Puesto'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=puesto_contacto&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Puesto'), 'contactos/administrarContactosClientes?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_cliente='.$id_cliente.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=puesto_contacto&type=asc'); ?></td>
				<?php endif; ?>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $contacto): ?>			
			<td><?php echo link_to($contacto->getNombre(),'contactos/verContacto?id_md5_contacto='.$contacto->getIdMd5Contacto()); ?></td>
			<td><?php echo $contacto->getApellidos(); ?></td>
			<?php $nombre_cliente = $acc_contactos->obtenerNombreClienteXIdContactado($contacto->getIdContactado())?>
			<td><?php echo $nombre_cliente; ?></td>
			<td><?php echo $contacto->getTelefono(); ?></td>
			<td><?php echo $contacto->getFax(); ?></td>
			<td><?php echo $contacto->getMovil(); ?></td>
			<td><?php echo $contacto->getEmail(); ?></td>
			<?php $nombre_jefe = $acc_contactos->obtenerNombreJefeXIdJefe($contacto->getIdJefe())?>
			<td><?php echo $nombre_jefe; ?></td>
			<td><?php echo $contacto->getPuesto(); ?></td>
			<td><?php echo link_to(image_tag('../images/edit.png'),'/contactos/editarContacto?id_md5_contacto='.$contacto->getIdMd5Contacto().'&opcion=clientes'); ?></td>
			<?php if($id_grupo == 1):?>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'/contactos/borrarContacto?id_md5_contacto='.$contacto->getIdMd5Contacto().'&opcion=clientes',array('confirm' => '¿Est&aacute;s seguro?')); ?></td>
			<?php endif; ?>			
			</tr>		
 	 	<?php endforeach; ?>
 	 </table>
<?php endif; ?> 