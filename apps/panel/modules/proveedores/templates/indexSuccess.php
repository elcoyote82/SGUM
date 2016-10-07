<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Proveedores'),'/proveedores/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Proveedor'),'/proveedores/agregarProveedor'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Contactos Proveedores'),'/contactos/administrarContactosProveedores'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Contacto'),'/contactos/agregarContacto?opcion=proveedores'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("ADMINISTRACIÓN DE PROVEEDORES"); ?>
</div>
<div class='buscador_ancho'>
	<?php echo form_tag('/proveedores/index'); ?>
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
		<?php echo button_to(__('Restablecer'),'proveedores/index',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Proveedores"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún proveedor."); ?></td></tr>
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
	          <li class='previous'><?php echo link_to('&laquo;', 'proveedores/index?page='.$pager->getFirstPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'proveedores/index?page='.$pager->getPreviousPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/proveedores/index?page='.$page.'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'proveedores/index?page='.$pager->getNextPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'proveedores/index?page='.$pager->getLastPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<?php if($type == 'asc' && $sort == 'nombre_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Nombre'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'nombre_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Nombre'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Nombre'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'cif_nif_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('CIF/NIF'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cif_nif_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'cif_nif_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('CIF/NIF'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cif_nif_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('CIF/NIF'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cif_nif_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'direccion_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Dirección'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=direccion_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'direccion_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Dirección'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=direccion_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Dirección'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=direccion_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'poblacion_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Población'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=poblacion_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'poblacion_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Población'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=poblacion_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Población'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=poblacion_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'provincia_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Provincia'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=provincia_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'provincia_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Provincia'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=provincia_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Provincia'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=provincia_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'cp_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('CP'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cp_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'cp_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('CP'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cp_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('CP'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cp_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'pais_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('País'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=pais_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'pais_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('País'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=pais_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('País'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=pais_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'telefono_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Teléfono'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'telefono_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Teléfono'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Teléfono'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'telefono2_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Otro Teléfono'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono2_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'telefono2_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Otro Teléfono'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono2_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Otro Teléfono'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono2_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'movil_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Movil'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'movil_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Movil'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Movil'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'fax_proveedor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Fax'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fax_proveedor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'fax_proveedor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Fax'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fax_proveedor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Fax'), 'proveedores/index?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fax_proveedor&type=asc'); ?></td>
				<?php endif; ?>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $proveedor): ?>			
			<td><?php echo link_to($proveedor->getNombre(),'proveedores/verProveedor?id_md5_proveedor='.$proveedor->getIdMd5Proveedor()); ?></td>
			<td><?php echo $proveedor->getCifNif(); ?></td>
			<td><?php echo $proveedor->getDireccion(); ?></td>
			<td><?php echo $proveedor->getPoblacion(); ?></td>
			<td><?php echo $proveedor->getProvincia(); ?></td>
			<td><?php echo $proveedor->getCP(); ?></td>
			<td><?php echo $proveedor->getPais(); ?></td>			
			<td><?php echo $proveedor->getTelefono(); ?></td>
			<td><?php echo $proveedor->getTelefono2(); ?></td>
			<td><?php echo $proveedor->getMovil(); ?></td>
			<td><?php echo $proveedor->getFax(); ?></td>
			<td><?php echo link_to(image_tag('../images/edit.png'),'/proveedores/editarProveedor?id_md5_proveedor='.$proveedor->getIdMd5Proveedor()); ?></td>
			<?php if($id_grupo == 1):?>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'/proveedores/borrarProveedor?id_md5_proveedor='.$proveedor->getIdMd5Proveedor(),array('confirm' => '¿Est&aacute;s seguro?')); ?></td>
			<?php endif; ?>			
			</tr>		
 	 	<?php endforeach; ?>
 	 </table>
<?php endif; ?> 
</div>