<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Conductores'),'/transporte/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Conductor'),'/transporte/agregarTransporteConductor'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Empresas de Transporte'),'/transporte/administrarTransporteEmpresas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Empresa'),'/transporte/agregarTransporteEmpresa'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("ADMINISTRACIÓN DE EMPRESAS DE TRANSPORTE"); ?>
</div>
<div class='buscador_ancho'>
	<?php echo form_tag('/transporte/administrarTransporteEmpresas'); ?>
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
		<?php echo button_to(__('Restablecer'),'transporte/administrarTransporteEmpresas',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Empresas de Transporte"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ninguna empresa de transporte."); ?></td></tr>
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
	          <li class='previous'><?php echo link_to('&laquo;', 'transporte/administrarTransporteEmpresas?page='.$pager->getFirstPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'transporte/administrarTransporteEmpresas?page='.$pager->getPreviousPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/transporte/administrarTransporteEmpresas?page='.$page.'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'transporte/administrarTransporteEmpresas?page='.$pager->getNextPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'transporte/administrarTransporteEmpresas?page='.$pager->getLastPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<?php if($type == 'asc' && $sort == 'nombre_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Nombre'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'nombre_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Nombre'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Nombre'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'cif_nif_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('CIF/NIF'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cif_nif_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'cif_nif_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('CIF/NIF'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cif_nif_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('CIF/NIF'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cif_nif_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'direccion_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Dirección'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=direccion_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'direccion_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Dirección'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=direccion_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Dirección'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=direccion_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'poblacion_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Población'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=poblacion_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'poblacion_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Población'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=poblacion_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Población'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=poblacion_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'provincia_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Provincia'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=provincia_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'provincia_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Provincia'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=provincia_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Provincia'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=provincia_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'cp_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('CP'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cp_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'cp_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('CP'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cp_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('CP'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=cp_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'pais_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('País'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=pais_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'pais_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('País'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=pais_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('País'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=pais_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'telefono_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Teléfono'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'telefono_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Teléfono'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Teléfono'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'email_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Email'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=email_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'email_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Email'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=email_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Email'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=email_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'web_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Web'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=web_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'web_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Web'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=web_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Web'), 'transporte/administrarTransporteEmpresas?page='.$pager->getPage().'&nombre='.$nombre.'&cif_nif='.$cif_nif.'&pais='.$pais.'&provincia='.$provincia.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=web_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $transporte_empresa): ?>			
			<td><?php echo link_to($transporte_empresa->getNombre(),'transporte/verTransporteEmpresa?id_md5_transporte_empresa='.$transporte_empresa->getIdMd5TransporteEmpresa()); ?></td>
			<td><?php echo $transporte_empresa->getCifNif(); ?></td>
			<td><?php echo $transporte_empresa->getDireccion(); ?></td>
			<td><?php echo $transporte_empresa->getPoblacion(); ?></td>
			<td><?php echo $transporte_empresa->getProvincia(); ?></td>
			<td><?php echo $transporte_empresa->getCP(); ?></td>
			<td><?php echo $transporte_empresa->getPais(); ?></td>			
			<td><?php echo $transporte_empresa->getTelefono(); ?></td>
			<td><?php echo $transporte_empresa->getEmail(); ?></td>
			<?php if($transporte_empresa->getWeb() != ''): ?>
				<td><?php echo link_to($transporte_empresa->getWeb(),"http://".$transporte_empresa->getWeb(),'target=_blank'); ?></td>
			<?php else: ?>
				<td></td>
			<?php endif;?>
			<td><?php echo link_to(image_tag('../images/edit.png'),'/transporte/editarTransporteEmpresa?id_md5_transporte_empresa='.$transporte_empresa->getIdMd5TransporteEmpresa()); ?></td>
			<?php if($id_grupo == 1):?>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'/transporte/borrarTransporteEmpresa?id_md5_transporte_empresa='.$transporte_empresa->getIdMd5TransporteEmpresa(),array('confirm' => '¿Est&aacute;s seguro?')); ?></td>
			<?php endif; ?>			
			</tr>		
 	 	<?php endforeach; ?>
 	 </table>
<?php endif; ?> 