<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Agregar Venta'),'/ventas/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administrar Ventas'),'/ventas/administrarVentas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Pendientes'),'/ventas/ventasPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas En Proceso'),'/ventas/ventasEnProceso'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Enviadas'),'/ventas/ventasEnviadas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas Completas'),'/ventas/ventasCompletas'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Ventas Procesadas'),'/ventas/ventasProcesadas'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("VENTAS ENVIADAS"); ?>
</div>
<div class='buscador'>
	<?php echo form_tag('/ventas/ventasEnviadas'); ?>	
		<?php echo __("Cliente: "); ?>
		<?php echo select_tag('id_cliente',options_for_select($ar_clientes,$id_cliente)); ?>
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'ventas/ventasEnviadas',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Ventas Procesadas"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha procesado ninguna venta."); ?></td></tr>
	</table>
<?php else: ?>
	<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $num_venta = $acc_url->parsearEnvio($num_venta); ?>
		<?php $id_estado_venta = $acc_url->parsearEnvio($id_estado_venta); ?>
		<?php $id_cliente = $acc_url->parsearEnvio($id_cliente); ?>		
		<?php $fecha_venta = $acc_url->parsearEnvio($fecha_venta); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
		<?php $sort = $acc_url->parsearEnvio($sort); ?>
		<?php $type = $acc_url->parsearEnvio($type); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'ventas/ventasEnviadas?page='.$pager->getFirstPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'ventas/ventasEnviadas?page='.$pager->getPreviousPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/ventas/ventasEnviadas?page='.$page.'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'ventas/ventasEnviadas?page='.$pager->getNextPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'ventas/ventasEnviadas?page='.$pager->getLastPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<?php if($type == 'asc' && $sort == 'num_venta_venta'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Número Venta'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_venta_venta&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'num_venta_venta'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Número Venta'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_venta_venta&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Número Venta'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_venta_venta&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'id_cliente_venta'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Cliente'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_cliente_venta&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'id_cliente_venta'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Cliente'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_cliente_venta&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Cliente'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_cliente_venta&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'id_estado_venta_ventas'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Estado Venta'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_venta_ventas&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'id_estado_venta_ventas'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Estado Venta'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_venta_ventas&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Estado Venta'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_venta_ventas&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'fecha_venta_ventas'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Fecha Venta'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_venta_ventas&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'fecha_venta_ventas'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Fecha Venta'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_venta_ventas&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Fecha Venta'), 'ventas/ventasEnviadas?page='.$pager->getPage().'&num_venta_venta='.$num_venta.'&id_estado_venta='.$id_estado_venta.'&id_cliente='.$id_cliente.'&fecha_venta='.$fecha_venta.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_venta_ventas&type=asc'); ?></td>
				<?php endif; ?>
				<td colspan='3'><?php echo __("Acciones"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $ventas_enviadas): ?>
			<?php $nombre_cliente = $acc_clientes->obtenerNombreClienteXIdCliente($ventas_enviadas->getIdCliente());?>
			<?php $id_estado_venta = $ventas_enviadas->getIdEstadoVenta();?>
			<?php $obj_estado_venta = $acc_admin->obtenerObjEstadoVenta($id_estado_venta);?>
			<tr>
				<td><?php echo $ventas_enviadas->getNumVenta(); ?></td>
				<td><?php echo $nombre_cliente; ?></td>
				<td><?php echo $obj_estado_venta->getEstadoVenta(); ?></td>
				<td><?php echo $ventas_enviadas->getCreatedAt(); ?></td>
				<td><?php echo link_to(image_tag('../images/lupa.png'),'/ventas/verVenta?id_md5_venta='.$ventas_enviadas->getIdMd5Venta(), 'title=Ver venta'); ?></td>
				<td><?php echo link_to(image_tag('../images/pdf2.png'),'/ventas/descargarInformeVenta?id_md5_venta='.$ventas_enviadas->getIdMd5Venta(), 'title=Descargar informe'); ?></td>								
				<td><?php echo link_to(image_tag('../images/ojo'),'/ventas/comprobarVentaCompleta?id_md5_venta='.$ventas_enviadas->getIdMd5Venta(), 'title=Comprobar Venta Completa'); ?></td>
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>