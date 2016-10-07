<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Administrar Entradas'),'/entradas/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Entradas Pendientes'),'/entradas/entradasPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Entradas Procesadas'),'/entradas/entradasProcesadas'); ?></div>	
</div>
<div id="tituloTabla" >
	<?php echo __("ADMINISTRACIÓN DE ENTRADAS"); ?>
</div>
<div class='buscador_ancho'>
	<?php echo form_tag('/entradas/index'); ?>
		<?php echo __("Estado: "); ?>
		<?php echo select_tag('id_estado_entrada',options_for_select($ar_estado_entradas,$id_estado_entrada)); ?>	
		<?php echo __("Proveedor: "); ?>
		<?php echo select_tag('id_proveedor',options_for_select($ar_proveedores,$id_proveedor)); ?>
		<br /><br />
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'entradas/index',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Entradas"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ninguna entrada."); ?></td></tr>
	</table>
<?php else: ?>
	<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $num_entrada = $acc_url->parsearEnvio($num_entrada); ?>
		<?php $id_estado_entrada = $acc_url->parsearEnvio($id_estado_entrada); ?>
		<?php $id_proveedor = $acc_url->parsearEnvio($id_proveedor); ?>		
		<?php $fecha_entrada = $acc_url->parsearEnvio($fecha_entrada); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
		<?php $sort = $acc_url->parsearEnvio($sort); ?>
		<?php $type = $acc_url->parsearEnvio($type); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'entradas/index?page='.$pager->getFirstPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'entradas/index?page='.$pager->getPreviousPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/entradas/index?page='.$page.'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'entradas/index?page='.$pager->getNextPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'entradas/index?page='.$pager->getLastPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<?php if($type == 'asc' && $sort == 'num_entrada_entrada'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Número Entrada'), 'entradas/index?page='.$pager->getPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_entrada_entrada&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'num_entrada_entrada'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Número Entrada'), 'entradas/index?page='.$pager->getPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_entrada_entrada&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Número Entrada'), 'entradas/index?page='.$pager->getPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_entrada_entrada&type=asc'); ?></td>
				<?php endif; ?>
				<td><?php echo __("Número Pedido"); ?></td>
				<td><?php echo __("Proveedor"); ?></td>
				<?php if($type == 'asc' && $sort == 'id_estado_entrada_entradas'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Estado Entrada'), 'entradas/index?page='.$pager->getPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_entrada_entradas&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'id_estado_entrada_entradas'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Estado Entrada'), 'entradas/index?page='.$pager->getPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_entrada_entradas&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Estado Entrada'), 'entradas/index?page='.$pager->getPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_entrada_entradas&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'fecha_entrada_entradas'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Fecha Entrada'), 'entradas/index?page='.$pager->getPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_entrada_entradas&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'fecha_entrada_entradas'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Fecha Entrada'), 'entradas/index?page='.$pager->getPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_entrada_entradas&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Fecha Entrada'), 'entradas/index?page='.$pager->getPage().'&num_entrada_entrada='.$num_entrada.'&id_estado_entrada='.$id_estado_entrada.'&id_proveedor='.$id_proveedor.'&fecha_entrada='.$fecha_entrada.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_entrada_entradas&type=asc'); ?></td>
				<?php endif; ?>
				<td colspan='2'><?php echo __("Acciones"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $entrada): ?>
			<?php $obj_pedido = $acc_pedidos->obtenerObjPedido($entrada->getIdPedido()); ?>
			<?php $nombre_proveedor = $acc_proveedores->obtenerNombreProveedorXIdProveedor($obj_pedido->getIdProveedor());?>
			<?php $id_estado_entrada = $entrada->getIdEstadoEntrada();?>
			<?php $obj_estado_entrada = $acc_admin->obtenerObjEstadoEntrada($id_estado_entrada);?>
			<tr>
				<td><?php echo $entrada->getNumEntrada(); ?></td>
				<td><?php echo $obj_pedido->getNumPedido(); ?></td>
				<td><?php echo $nombre_proveedor; ?></td>
				<td><?php echo $obj_estado_entrada->getEstadoEntrada(); ?></td>
				<td><?php echo $entrada->getCreatedAt(); ?></td>				
				<?php if($id_estado_entrada == 1): ?>
					<td><?php echo link_to(image_tag('../images/lupa.png'),'/entradas/verEntrada?id_md5_entrada='.$entrada->getIdMd5Entrada(), 'title=Ver entrada'); ?></td>
					<td><?php echo link_to(image_tag('../images/right.png'),'/entradas/procesarEntrada?id_md5_entrada='.$entrada->getIdMd5Entrada(), 'title=Procesar Entrada'); ?></td>
				<?php elseif($id_estado_entrada == 2): ?>
					<td><?php echo link_to(image_tag('../images/lupa.png'),'/entradas/verEntrada?id_md5_entrada='.$entrada->getIdMd5Entrada(), 'title=Ver entrada'); ?></td>
					<td><?php echo link_to(image_tag('../images/pdf2.png'),'/entradas/descargarInformeEntrada?id_md5_entrada='.$entrada->getIdMd5Entrada(), 'title=Descargar informe'); ?></td>					
				<?php endif;?>								
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>