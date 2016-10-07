<?php echo 
	javascript_tag(" 
		function obtenerIdArticulo(text, li){ 
			$('id_articulo').value  = li.value 
 		} 
 	") 
 ?> 
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
	<?php echo __("AGREGAR VENTA"); ?>
</div>
<div class='buscador'>
<?php echo form_tag('/ventas/index'); ?>
	<?php echo input_hidden_tag('buscar',true); ?>		
	<?php echo __("Cliente: "); ?>
	<?php echo select_tag('id_cliente',options_for_select($ar_clientes,$id_cliente)); ?>
	<?php echo submit_tag(__('Buscar'),array('class'  => 'buttonEsqueleto')); ?>
	<?php echo button_to(__('Restablecer'),'ventas/index',array('class'  => 'buttonEsqueleto')); ?>	
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
		<?php $id_cliente = $acc_url->parsearEnvio($id_cliente); ?>
	      <ul class='paginator'>
	        <?php if ($pager->haveToPaginate()): ?>
	          <li class='previous'><?php echo link_to('&laquo;', 'ventas/index?page='.$pager->getFirstPage().'&id_cliente='.id_cliente) ?></li>
	          <li class='previous'><?php echo link_to('&lt;', 'ventas/index?page='.$pager->getPreviousPage().'&id_cliente='.id_cliente) ?></li>
	          <?php $links = $pager->getLinks(); 
	          foreach ($links as $page): ?>
	            <?php if($page == $pager->getPage()): ?>
	              <li class='current'><?php echo $page; ?></li>
	            <?php else: ?>
	              <li class='page'><?php echo link_to($page, '/ventas/index?page='.$page.'&id_cliente='.id_cliente) ?></li>
	            <?php endif; ?>
	            <?php if ($page != $pager->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	          <?php endforeach ?>
	          <li class='next'><?php echo link_to('&gt;', 'ventas/index?page='.$pager->getNextPage().'&id_cliente='.id_cliente) ?></li>
	          <li class='next'><?php echo link_to('&raquo;', 'ventas/index?page='.$pager->getLastPage().'&id_cliente='.id_cliente) ?></li>
	        <?php endif ?>
	      </ul>
	</div>		
	<table class='centrarTablas'>
		<thead>
			<tr>				
				<td><?php echo __("Nombre"); ?></td>
				<td><?php echo __("CIF/NIF"); ?></td>
				<td><?php echo __("Dirección"); ?></td>
				<td><?php echo __("Población"); ?></td>
				<td><?php echo __("Provincia"); ?></td>
				<td><?php echo __("CP"); ?></td>
				<td><?php echo __("Pais"); ?></td>
				<td><?php echo __("Teléfono"); ?></td>
				<td><?php echo __("Otro Teléfono"); ?></td>
				<td><?php echo __("Fax"); ?></td>
				<td><?php echo __("Email"); ?></td>
				<td><?php echo __("Venta"); ?></td>
			</tr>
		</thead>
		<?php foreach($pager->getResults() as $cliente): ?>
			<tr>							
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
				<?php $id_md5_cliente = $acc_url->parsearEnvio($cliente->getIdMd5Cliente()); ?>
				<td><?php echo link_to(image_tag('../images/tareas.png'),'ventas/agregarVenta?id_md5_cliente='.$id_md5_cliente); ?></td>					
 	 		</tr>
 	 	<?php endforeach; ?>
 	 </table>
<?php endif; ?>