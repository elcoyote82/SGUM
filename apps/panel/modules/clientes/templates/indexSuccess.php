<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Clientes'),'/clientes/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Cliente'),'/clientes/agregarCliente'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Clientes'),'/contactos/administrarContactosClientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Contacto'),'/contactos/agregarContacto?opcion=clientes'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("ADMINISTRACIÓN DE CLIENTES"); ?>
</div>
<div class='buscador_ancho'>
	<?php echo form_tag('/clientes/index'); ?>
		<?php echo __("Nombre: "); ?>
		<?php echo input_tag('nombre', $nombre) ?> 
		<?php echo __("CIF/NIF: "); ?>
		<?php echo input_tag('cif_nif', $cif_nif) ?>
		<br />		
		<?php echo __("Pais: "); ?>
		<?php echo select_country_tag('pais',$pais,array('include_custom' => ' ')); ?>
		<?php echo __("Provincia: "); ?>
		<?php echo select_tag('provincia',options_for_select($ar_provincias,$provincia)); ?>
		<br />
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'clientes/index',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Clientes"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún cliente."); ?></td></tr>
	</table>
<?php else: ?>
<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $nombre = $acc_url->parsearEnvio($nombre); ?>
		<?php $cif_nif = $acc_url->parsearEnvio($cif_nif); ?>
		<?php $pais = $acc_url->parsearEnvio($pais); ?>
		<?php $provincia = $acc_url->parsearEnvio($provincia); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
		<?php $sort = $acc_url->parsearEnvio($sort); ?>
		<?php $type = $acc_url->parsearEnvio($type); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'clientes/index?page='.$pager->getFirstPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'clientes/index?page='.$pager->getPreviousPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/clientes/index?page='.$page.'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'clientes/index?page='.$pager->getNextPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'clientes/index?page='.$pager->getLastPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<?php if($type == 'asc' && $sort == 'nombre_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Nombre'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'nombre_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Nombre'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Nombre'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'cif_nif_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('CIF/NIF'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cif_nif_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'cif_nif_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('CIF/NIF'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cif_nif_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('CIF/NIF'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cif_nif_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'direccion_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Dirección'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=direccion_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'direccion_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Dirección'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=direccion_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Dirección'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=direccion_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'poblacion_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Población'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=poblacion_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'poblacion_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Población'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=poblacion_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Población'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=poblacion_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'provincia_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Provincia'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=provincia_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'provincia_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Provincia'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=provincia_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Provincia'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=provincia_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'cp_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('CP'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cp_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'cp_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('CP'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cp_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('CP'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cp_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'pais_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('País'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=pais_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'pais_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('País'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=pais_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('País'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=pais_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'telefono_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Teléfono'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'telefono_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Teléfono'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Teléfono'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'telefono2_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Otro Teléfono'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono2_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'telefono2_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Otro Teléfono'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono2_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Otro Teléfono'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono2_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'movil_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Movil'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'movil_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Movil'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Movil'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'fax_cliente'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Fax'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fax_cliente&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'fax_cliente'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Fax'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fax_cliente&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Fax'), 'clientes/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fax_cliente&type=asc'); ?></td>
				<?php endif; ?>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $cliente): ?>			
			<td><?php echo link_to($cliente->getNombre(),'clientes/verCliente?id_md5_cliente='.$cliente->getIdMd5Cliente()); ?></td>
			<td><?php echo $cliente->getCifNif(); ?></td>
			<td><?php echo $cliente->getDireccion(); ?></td>
			<td><?php echo $cliente->getPoblacion(); ?></td>
			<td><?php echo $cliente->getProvincia(); ?></td>
			<td><?php echo $cliente->getCP(); ?></td>
			<td><?php echo $cliente->getPais(); ?></td>			
			<td><?php echo $cliente->getTelefono(); ?></td>
			<td><?php echo $cliente->getTelefono2(); ?></td>
			<td><?php echo $cliente->getFax(); ?></td>
			<td><?php echo $cliente->getEmail(); ?></td>
			<td><?php echo link_to(image_tag('../images/edit.png'),'/clientes/editarCliente?id_md5_cliente='.$cliente->getIdMd5Cliente()); ?></td>
			<?php if($id_grupo == 1):?>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'/clientes/borrarCliente?id_md5_cliente='.$cliente->getIdMd5Cliente(),array('confirm' => '¿Est&aacute;s seguro?')); ?></td>
			<?php endif; ?>			
			</tr>		
 	 	<?php endforeach; ?>
 	 </table>
<?php endif; ?> 