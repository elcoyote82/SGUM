<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Informes Pedidos'),'/informes/informesPedidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Informes Entradas'),'/informes/informesEntradas'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Informes Ventas'),'/informes/informesVentas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Informes Salidas'),'/informes/informesSalidas'); ?></div>	
</div>
<div id="tituloTabla" >
	<?php echo __("INFORMES VENTAS"); ?>
</div>
<div class='buscador'>
	<?php echo form_tag('/informes/informesVentas'); ?>	
		<?php echo __("Número Albarán: "); ?>
		<?php echo input_tag('num_albaran',$num_albaran); ?>
		<?php echo checkbox_tag('desde', 1, $desde); ?>
		<?php echo "desde el".input_date_tag('fecha_ini', $fecha_ini_inv, 'rich=true'); ?>
		<?php echo checkbox_tag('hasta', 1, $hasta); ?>
		<?php echo "hasta el ".input_date_tag('fecha_fin', $fecha_fin_inv, 'rich=true'); ?>
		<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
		<?php echo button_to(__('Restablecer'),'informes/informesVentas',array('class'  => 'buttonEsqueleto')); ?>	   
</div>
<?php if($pager->getnbResults() == 0): ?>
	<table class="centrarTablas">
		<thead>
			<tr><td align="center"><?php echo __("Informes"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún informe."); ?></td></tr>
	</table>
<?php else: ?>
	<br/>
	<div align='center'>
		<!-- Parseo de variables -->
		<?php $num_albaran = $acc_url->parsearEnvio($num_albaran); ?>
		<?php $fecha_informe = $acc_url->parsearEnvio($fecha_informe); ?>
		<?php $desde = $acc_url->parsearEnvio($desde); ?>
		<?php $fecha_ini_inv = $acc_url->parsearEnvio($fecha_ini_inv); ?>
		<?php $hasta = $acc_url->parsearEnvio($hasta); ?>
		<?php $fecha_fin_inv = $acc_url->parsearEnvio($fecha_fin_inv); ?>
		<?php $sort = $acc_url->parsearEnvio($sort); ?>
		<?php $type = $acc_url->parsearEnvio($type); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'informes/informesVentas?page='.$pager->getFirstPage().'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'informes/informesVentas?page='.$pager->getPreviousPage().'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/informes/informesVentas?page='.$page.'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'informes/informesVentas?page='.$pager->getNextPage().'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'informes/informesVentas?page='.$pager->getLastPage().'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort='.$sort.'&type='.$type) ?></li>
	        <?php endif ?>
	      </ul>
	</div>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<?php if($type == 'asc' && $sort == 'num_albaran_venta_informes'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Número Albarán'), 'informes/informesVentas?page='.$pager->getPage().'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_albaran_venta_informes&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'num_albaran_venta_informes'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Número Albarán'), 'informes/informesVentas?page='.$pager->getPage().'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_albaran_venta_informes&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Número Albarán'), 'informes/informesVentas?page='.$pager->getPage().'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=num_albaran_venta_informes&type=asc'); ?></td>
				<?php endif; ?>
				<td><?php echo __("Número Venta"); ?></td>
				<td><?php echo __("Cliente"); ?></td>
				<?php if($type == 'asc' && $sort == 'fecha_informe_venta_informes'): ?>
					<td><?php echo link_to(image_tag('descendente.gif').__('Fecha Informe'), 'informes/informesVentas?page='.$pager->getPage().'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_informe_venta_informes&type=desc'); ?></td>					
				<?php elseif($type == 'desc' && $sort == 'fecha_informe_venta_informes'): ?>
					<td><?php echo link_to(image_tag('ascendente.gif').__('Fecha Informe'), 'informes/informesVentas?page='.$pager->getPage().'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_informe_venta_informes&type=asc'); ?></td>
				<?php else: ?>
					<td><?php echo link_to(__('Fecha Informe'), 'informes/informesVentas?page='.$pager->getPage().'&num_albaran='.$num_albaran.'&fecha_informe='.$fecha_informe.'&desde='.$desde.'&fecha_ini='.$fecha_ini_inv.'&hasta='.$hasta.'&fecha_fin='.$fecha_fin_inv.'&sort=fecha_informe_venta_informes&type=asc'); ?></td>
				<?php endif; ?>
				<td colspan='2'><?php echo __("Acciones"); ?></td>
			</tr>
		</thead>
		<tr>
		<?php foreach($pager->getResults() as $informes): ?>
			<?php $obj_venta = $acc_ventas->obtenerObjVentaXIdMd5Albaran($informes->getIdMd5Albaran()); ?>
			<?php $nombre_cliente = $acc_clientes->obtenerNombreClienteXIdCliente($obj_venta->getIdCliente());?>
			<tr>
				<td><?php echo $informes->getNumAlbaranVenta(); ?></td>
				<td><?php echo $obj_venta->getNumVenta(); ?></td>
				<td><?php echo $nombre_cliente; ?></td>
				<td><?php echo $informes->getCreatedAt(); ?></td>
				<td><?php echo link_to(image_tag('../images/lupa.png'),'/informes/verInformeVenta?id_md5_albaran='.$informes->getIdMd5Albaran(), 'title=Ver Albarán'); ?></td>
				<td><?php echo link_to(image_tag('../images/pdf2.png'),'/informes/descargarInformeVenta?id_md5_albaran='.$informes->getIdMd5Albaran(), 'title=Descargar informe'); ?></td>				
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>