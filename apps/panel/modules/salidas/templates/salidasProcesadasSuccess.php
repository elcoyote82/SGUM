<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Administrar Salidas'),'/salidas/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Salidas Pendientes'),'/salidas/salidasPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Salidas Procesadas'),'/salidas/salidasProcesadas'); ?></div>	
</div>
<div id="tituloTabla" >
	<?php echo __("SALIDAS PROCESADAS"); ?>
</div>
<div class='buscador'>
	<?php echo form_tag('/salidas/salidasProcesadas'); ?>	
		<?php echo __("Cliente: "); ?>
		<?php echo select_tag('id_cliente',options_for_select($ar_clientes,$id_cliente)); ?>
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'salidas/salidasProcesadas',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Salidas"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ninguna salida procesada."); ?></td></tr>
	</table>
<?php else: ?>
	<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $num_salida = $acc_url->parsearEnvio($num_salida); ?>
		<?php $id_estado_salida = $acc_url->parsearEnvio($id_estado_salida); ?>		
		<?php $id_cliente = $acc_url->parsearEnvio($id_cliente); ?>
		<?php $fecha_salida = $acc_url->parsearEnvio($fecha_salida); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
		<?php $sort = $acc_url->parsearEnvio($sort); ?>
		<?php $type = $acc_url->parsearEnvio($type); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'salidas/salidasProcesadas?page='.$pager->getFirstPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'salidas/salidasProcesadas?page='.$pager->getPreviousPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/salidas/salidasProcesadas?page='.$page.'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'salidas/salidasProcesadas?page='.$pager->getNextPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'salidas/salidasProcesadas?page='.$pager->getLastPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<?php if($type == 'asc' && $sort == 'num_salida_salida'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Número Salida'), 'salidas/salidasProcesadas?page='.$pager->getPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_salida_salida&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'num_salida_salida'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Número Salida'), 'salidas/salidasProcesadas?page='.$pager->getPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_salida_salida&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Número Salida'), 'salidas/salidasProcesadas?page='.$pager->getPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_salida_salida&type=asc'); ?></td>
				<?php endif; ?>
				<td><?php echo __("Número Venta"); ?></td>
				<td><?php echo __("Cliente"); ?></td>	
				<?php if($type == 'asc' && $sort == 'id_estado_salida_salidas'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Estado Salida'), 'salidas/salidasProcesadas?page='.$pager->getPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_salida_salidas&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'id_estado_salida_salidas'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Estado Salida'), 'salidas/salidasProcesadas?page='.$pager->getPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_salida_salidas&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Estado Salida'), 'salidas/salidasProcesadas?page='.$pager->getPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=id_estado_salida_salidas&type=asc'); ?></td>
				<?php endif; ?>
				<?php if($type == 'asc' && $sort == 'fecha_salida_salidas'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Fecha Salida'), 'salidas/salidasProcesadas?page='.$pager->getPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_salida_salidas&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'fecha_salida_salidas'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Fecha Salida'), 'salidas/salidasProcesadas?page='.$pager->getPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_salida_salidas&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Fecha Salida'), 'salidas/salidasProcesadas?page='.$pager->getPage().'&num_salida='.$num_salida.'&id_estado_salida='.$id_estado_salida.'&id_cliente='.$id_cliente.'&fecha_salida='.$fecha_salida.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_salida_salidas&type=asc'); ?></td>
				<?php endif; ?>
				<td colspan='2'><?php echo __("Acciones"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $salida): ?>
			<?php $obj_venta = $acc_ventas->obtenerObjVenta($salida->getIdVenta()); ?>
			<?php $nombre_cliente = $acc_clientes->obtenerNombreClienteXIdCliente($obj_venta->getIdCliente());?>
			<?php $id_estado_salida = $salida->getIdEstadoSalida();?>
			<?php $obj_estado_salida = $acc_admin->obtenerObjEstadoSalida($id_estado_salida);?>
			<tr>
				<td><?php echo $salida->getNumSalida(); ?></td>
				<td><?php echo $obj_venta->getNumVenta(); ?></td>
				<td><?php echo $nombre_cliente; ?></td>
				<td><?php echo $obj_estado_salida->getEstadoSalida(); ?></td>
				<td><?php echo $salida->getCreatedAt(); ?></td>
				<td><?php echo link_to(image_tag('../images/lupa.png'),'/salidas/verSalida?id_md5_salida='.$salida->getIdMd5Salida(), 'title=Ver salida'); ?></td>
				<td><?php echo link_to(image_tag('../images/pdf2.png'),'/salidas/descargarInformeSalida?id_md5_salida='.$salida->getIdMd5Salida(), 'title=Descargar informe'); ?></td>					
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>