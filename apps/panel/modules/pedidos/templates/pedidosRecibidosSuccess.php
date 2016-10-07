<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Agregar Pedido'),'/pedidos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administrar Pedidos'),'/pedidos/administrarPedidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Pendientes'),'/pedidos/pedidosPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos En Proceso'),'/pedidos/pedidosEnProceso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Recibidos'),'/pedidos/pedidosRecibidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Completos'),'/pedidos/pedidosCompletos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos Procesados'),'/pedidos/pedidosProcesados'); ?></div>	
</div>
<div id="tituloTabla" >
	<?php echo __("PEDIDOS RECIBIDOS"); ?>
</div>
<div class='buscador'>
	<?php echo form_tag('/pedidos/pedidosRecibidos'); ?>	
		<?php echo __("Proveedor: "); ?>
		<?php echo select_tag('id_proveedor',options_for_select($ar_proveedores,$id_proveedor)); ?>
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'pedidos/pedidosRecibidos',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Pedidos Recibidos"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha recibido ningún pedido."); ?></td></tr>
	</table>
<?php else: ?>
	<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $num_pedido = $acc_url->parsearEnvio($num_pedido); ?>
		<?php $id_estado_pedido = $acc_url->parsearEnvio($id_estado_pedido); ?>
		<?php $id_proveedor = $acc_url->parsearEnvio($id_proveedor); ?>		
		<?php $fecha_pedido = $acc_url->parsearEnvio($fecha_pedido); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
		<?php $sort = $acc_url->parsearEnvio($sort); ?>
		<?php $type = $acc_url->parsearEnvio($type); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'pedidos/pedidosRecibidos?page='.$pager->getFirstPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'pedidos/pedidosRecibidos?page='.$pager->getPreviousPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/pedidos/pedidosRecibidos?page='.$page.'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'pedidos/pedidosRecibidos?page='.$pager->getNextPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'pedidos/pedidosRecibidos?page='.$pager->getLastPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<?php if($type == 'asc' && $sort == 'num_pedido_pedido'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Número Pedido'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_pedido_pedido&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'num_pedido_pedido'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Número Pedido'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_pedido_pedido&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Número Pedido'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_pedido_pedido&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'id_proveedor_pedido'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Proveedor'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_proveedor_pedido&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'id_proveedor_pedido'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Proveedor'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_proveedor_pedido&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Proveedor'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_proveedor_pedido&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'id_estado_pedido_pedidos'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Estado Pedido'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_pedido_pedidos&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'id_estado_pedido_pedidos'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Estado Pedido'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_pedido_pedidos&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Estado Pedido'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_pedido_pedidos&type=asc'); ?></td>
				<?php endif; ?>				
				<?php if($type == 'asc' && $sort == 'fecha_pedido_pedidos'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Fecha Pedido'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_pedido_pedidos&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'fecha_pedido_pedidos'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Fecha Pedido'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_pedido_pedidos&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Fecha Pedido'), 'pedidos/pedidosRecibidos?page='.$pager->getPage().'&num_pedido_pedido='.$num_pedido.'&id_estado_pedido='.$id_estado_pedido.'&id_proveedor='.$id_proveedor.'&fecha_pedido='.$fecha_pedido.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_pedido_pedidos&type=asc'); ?></td>
				<?php endif; ?>
				<td colspan='3'><?php echo __("Acciones"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $pedidos_recibidos): ?>
			<?php $nombre_proveedor = $acc_proveedores->obtenerNombreProveedorXIdProveedor($pedidos_recibidos->getIdProveedor());?>
			<?php $id_estado_pedido = $pedidos_recibidos->getIdEstadoPedido();?>
			<?php $obj_estado_pedido = $acc_admin->obtenerObjEstadoPedido($id_estado_pedido);?>
			<tr>
				<td><?php echo $pedidos_recibidos->getNumPedido(); ?></td>
				<td><?php echo $nombre_proveedor; ?></td>
				<td><?php echo $obj_estado_pedido->getEstadoPedido(); ?></td>
				<td><?php echo $pedidos_recibidos->getCreatedAt(); ?></td>
				<td><?php echo link_to(image_tag('../images/lupa.png'),'/pedidos/verPedido?id_md5_pedido='.$pedidos_recibidos->getIdMd5Pedido(), 'title=Ver pedido'); ?></td>
				<td><?php echo link_to(image_tag('../images/pdf2.png'),'/pedidos/descargarInformePedido?id_md5_pedido='.$pedidos_recibidos->getIdMd5Pedido(), 'title=Descargar informe'); ?></td>								
				<td><?php echo link_to(image_tag('../images/ojo.png'),'/pedidos/comprobarPedidoCompleto?id_md5_pedido='.$pedidos_recibidos->getIdMd5Pedido(), 'title=Comprobar Pedido Completo'); ?></td>
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>