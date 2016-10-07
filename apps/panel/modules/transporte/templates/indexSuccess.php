<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Conductores'),'/transporte/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Conductor'),'/transporte/agregarTransporteConductor'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Empresas de Transporte'),'/transporte/administrarTransporteEmpresas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Empresa'),'/transporte/agregarTransporteEmpresa'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("ADMINISTRACIÓN DE CONDUCTORES"); ?>
</div>
<div class='buscador_ancho'>
	<?php echo form_tag('/transporte/index'); ?>
		<?php echo __("Nombre: "); ?>
		<?php echo input_tag('nombre', $nombre) ?> 
		<?php echo __("Apellidos: "); ?>
		<?php echo input_tag('apellidos', $apellidos,'size=>50') ?>
		<?php echo __("Empresa: "); ?>
		<?php echo select_tag('id_transporte_empresa',options_for_select($ar_transporte_empresas,$id_transporte_empresa)); ?>
		<br /><br />
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'transporte/index',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Conductores"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún conductor."); ?></td></tr>
	</table>
<?php else: ?>
<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $nombre = $acc_url->parsearEnvio($nombre); ?>
		<?php $apellidos = $acc_url->parsearEnvio($apellidos); ?>
		<?php $id_transporte_empresa = $acc_url->parsearEnvio($id_transporte_empresa); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
		<?php $sort = $acc_url->parsearEnvio($sort); ?>
		<?php $type = $acc_url->parsearEnvio($type); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'transporte/index?page='.$pager->getFirstPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'transporte/index?page='.$pager->getPreviousPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/transporte/index?page='.$page.'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'transporte/index?page='.$pager->getNextPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'transporte/index?page='.$pager->getLastPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<?php if($type == 'asc' && $sort == 'nombre_transporte_conductor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Nombre'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_transporte_conductor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'nombre_transporte_conductor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Nombre'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_transporte_conductor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Nombre'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=nombre_transporte_conductor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'apellidos_transporte_conductor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Apellidos'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=apellidos_transporte_conductor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'apellidos_transporte_conductor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Apellidos'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=apellidos_transporte_conductor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Apellidos'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=apellidos_transporte_conductor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'id_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Empresa'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_transporte_empresa&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'id_transporte_empresa'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Empresa'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_transporte_empresa&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Empresa'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_transporte_empresa&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'telefono_transporte_conductor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Teléfono'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_transporte_conductor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'telefono_transporte_conductor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Teléfono'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_transporte_conductor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Teléfono'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=telefono_transporte_conductor&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'movil_transporte_conductor'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Móvil'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_transporte_conductor&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'movil_transporte_conductor'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Móvil'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_transporte_conductor&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Móvil'), 'transporte/index?page='.$pager->getPage().'&nombre='.$nombre.'&apellidos='.$apellidos.'&id_transporte_empresa='.$id_transporte_empresa.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=movil_transporte_conductor&type=asc'); ?></td>
				<?php endif; ?>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $transporte_conductor): ?>			
			<td><?php echo link_to($transporte_conductor->getNombre(),'transporte/verTransporteConductor?id_md5_transporte_conductor='.$transporte_conductor->getIdMd5TransporteConductor()); ?></td>
			<td><?php echo $transporte_conductor->getApellidos(); ?></td>
			<?php $obj_transporte_empresa = $acc_transporte->obtenerObjTransporteEmpresa($transporte_conductor->getIdTransporteEmpresa()); ?>
			<?php if($obj_transporte_empresa): ?>
				<?php $nombre_empresa = $obj_transporte_empresa->getNombre(); ?>
			<?php else: ?>
				<?php $nombre_empresa = ''; ?>
			<?php endif; ?>
			<td><?php echo $nombre_empresa; ?></td>
			<td><?php echo $transporte_conductor->getTelefono(); ?></td>
			<td><?php echo $transporte_conductor->getMovil(); ?></td>
			<td><?php echo link_to(image_tag('../images/edit.png'),'/transporte/editarTransporteConductor?id_md5_transporte_conductor='.$transporte_conductor->getIdMd5TransporteConductor()); ?></td>
			<?php if($id_grupo == 1):?>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'/transporte/borrarTransporteConductor?id_md5_transporte_conductor='.$transporte_conductor->getIdMd5TransporteConductor(),array('confirm' => '¿Est&aacute;s seguro?')); ?></td>
			<?php endif; ?>
			</tr>		
 	 	<?php endforeach; ?>
 	 </table>
<?php endif; ?> 