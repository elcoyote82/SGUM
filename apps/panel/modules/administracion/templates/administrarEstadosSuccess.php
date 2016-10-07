<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Volver'),'/administracion/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Pedido'),'/administracion/crearEstadoPedido'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Entrada'),'/administracion/crearEstadoEntrada'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Salida'),'/administracion/crearEstadoSalida'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Crear Estado Venta'),'/administracion/crearEstadoVenta'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("ADMINISTRACIÓN DE ESTADOS"); ?>
</div>
<!-- Tabla de Estado Pedidos -->
<?php if($pager_estado_pedidos->getnbResults() == 0): ?>
	<table class="tablasEstados">
		<thead>
			<tr><td align="center"><?php echo __("Estado Pedidos"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún estado."); ?></td></tr>
	</table>
<?php else: ?>
	<div class='tablasEstados' align='center'>
	   <ul class='paginator'>
	     <?php if ($pager_estado_pedidos->haveToPaginate()): ?>
	       <li class='previous'><?php echo link_to('&laquo;', 'administracion/administrarEstados?page_estado_pedidos='.$pager_estado_pedidos->getFirstPage()); ?></li>
	       <li class='previous'><?php echo link_to('&lt;', 'administracion/administrarEstados?page_estado_pedidos='.$pager_estado_pedidos->getPreviousPage()); ?></li>
	       <?php $links = $pager_estado_pedidos->getLinks(); 
	       foreach ($links as $page_estado_pedidos): ?>
	         <?php if($page_estado_pedidos == $pager_estado_pedidos->getPage()): ?>
	           <li class='current'><?php echo $page_estado_pedidos; ?></li>
	         <?php else: ?>
	           <li class='page'><?php echo link_to($page_estado_pedidos, 'administracion/administrarEstados?page_estado_pedidos='.$page_estado_pedidos); ?></li>
	         <?php endif; ?>
	         <?php if ($page_estado_pedidos != $pager_estado_pedidos->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	       <?php endforeach ?>
	       <li class='next'><?php echo link_to('&gt;', 'administracion/administrarEstados?page_estado_pedidos='.$pager_estado_pedidos->getNextPage()); ?></li>
	       <li class='next'><?php echo link_to('&raquo;', 'administracion/administrarEstados?page_estado_pedidos='.$pager_estado_pedidos->getLastPage()); ?></li>
	     <?php endif ?>
	   </ul>
	</div>	
	<table class='tablasEstados'>
		<thead>	
			<tr>
				<td colspan='3'><?php echo __("ESTADO PEDIDOS"); ?></td>
			</tr>		
			<tr>
				<td><?php echo __("Estado"); ?></td>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>			
		<?php foreach($pager_estado_pedidos->getResults() as $estado_pedido): ?>
			<tr>
				<td><?php echo $estado_pedido->getEstadoPedido(); ?></td>
				<td><?php echo link_to(image_tag('../images/edit.png'),'administracion/editarEstadoPedido?id_estado_pedido='.$estado_pedido->getIdEstadoPedido()); ?></td>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'administracion/borrarEstadoPedido?id_estado_pedido='.$estado_pedido->getIdEstadoPedido(),array('confirm' => '¿Estás seguro?')); ?></td>				
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>

<!-- Tabla de Estado Entradas -->
<?php if($pager_estado_entradas->getnbResults() == 0): ?>
	<table class="tablasEstados">
		<thead>
			<tr><td align="center"><?php echo __("Estado Entradas"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún estado."); ?></td></tr>
	</table>
<?php else: ?>
	<div class='tablasEstados' align='center'>
	   <ul class='paginator'>
	     <?php if ($pager_estado_entradas->haveToPaginate()): ?>
	       <li class='previous'><?php echo link_to('&laquo;', 'administracion/administrarEstados?page_estado_entradas='.$pager_estado_entradas->getFirstPage()); ?></li>
	       <li class='previous'><?php echo link_to('&lt;', 'administracion/administrarEstados?page_estado_entradas='.$pager_estado_entradas->getPreviousPage()); ?></li>
	       <?php $links = $pager_estado_entradas->getLinks(); 
	       foreach ($links as $page_estado_entradas): ?>
	         <?php if($page_estado_entradas == $pager_estado_entradas->getPage()): ?>
	           <li class='current'><?php echo $page_estado_entradas; ?></li>
	         <?php else: ?>
	           <li class='page'><?php echo link_to($page_estado_entradas, 'administracion/administrarEstados?page_estado_entradas='.$page_estado_entradas); ?></li>
	         <?php endif; ?>
	         <?php if ($page_estado_entradas != $pager_estado_entradas->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	       <?php endforeach ?>
	       <li class='next'><?php echo link_to('&gt;', 'administracion/administrarEstados?page_estado_entradas='.$pager_estado_entradas->getNextPage()); ?></li>
	       <li class='next'><?php echo link_to('&raquo;', 'administracion/administrarEstados?page_estado_entradas='.$pager_estado_entradas->getLastPage()); ?></li>
	     <?php endif ?>
	   </ul>
	</div>	
	<table class='tablasEstados'>
		<thead>
			<tr>
				<td colspan='3'><?php echo __("ESTADO ENTRADAS"); ?></td>
			</tr>			
			<tr>
				<td><?php echo __("Estado"); ?></td>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>			
		<?php foreach($pager_estado_entradas->getResults() as $estado_entrada): ?>
			<tr>
				<td><?php echo $estado_entrada->getEstadoEntrada(); ?></td>
				<td><?php echo link_to(image_tag('../images/edit.png'),'administracion/editarEstadoEntrada?id_estado_entrada='.$estado_entrada->getIdEstadoEntrada()); ?></td>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'administracion/borrarEstadoEntrada?id_estado_entrada='.$estado_entrada->getIdEstadoEntrada(),array('confirm' => '¿Estás seguro?')); ?></td>				
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>

<!-- Tabla de Estado Salidas -->
<?php if($pager_estado_salidas->getnbResults() == 0): ?>
	<table class="tablasEstados">
		<thead>
			<tr><td align="center"><?php echo __("Estado Salidas"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún estado."); ?></td></tr>
	</table>
<?php else: ?>
	<div class='tablasEstados' align='center'>
	   <ul class='paginator'>
	     <?php if ($pager_estado_salidas->haveToPaginate()): ?>
	       <li class='previous'><?php echo link_to('&laquo;', 'administracion/administrarEstados?page_estado_salidas='.$pager_estado_salidas->getFirstPage()); ?></li>
	       <li class='previous'><?php echo link_to('&lt;', 'administracion/administrarEstados?page_estado_salidas='.$pager_estado_salidas->getPreviousPage()); ?></li>
	       <?php $links = $pager_estado_salidas->getLinks(); 
	       foreach ($links as $page_estado_salidas): ?>
	         <?php if($page_estado_salidas == $pager_estado_salidas->getPage()): ?>
	           <li class='current'><?php echo $page_estado_salidas; ?></li>
	         <?php else: ?>
	           <li class='page'><?php echo link_to($page_estado_salidas, 'administracion/administrarEstados?page_estado_salidas='.$page_estado_salidas); ?></li>
	         <?php endif; ?>
	         <?php if ($page_estado_salidas != $pager_estado_salidas->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	       <?php endforeach ?>
	       <li class='next'><?php echo link_to('&gt;', 'administracion/administrarEstados?page_estado_salidas='.$pager_estado_salidas->getNextPage()); ?></li>
	       <li class='next'><?php echo link_to('&raquo;', 'administracion/administrarEstados?page_estado_salidas='.$pager_estado_salidas->getLastPage()); ?></li>
	     <?php endif ?>
	   </ul>
	</div>	
	<table class='tablasEstados'>
		<thead>
			<tr>
				<td colspan='3'><?php echo __("ESTADO SALIDAS"); ?></td>
			</tr>			
			<tr>
				<td><?php echo __("Estado"); ?></td>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>			
		<?php foreach($pager_estado_salidas->getResults() as $estado_salida): ?>
			<tr>
				<td><?php echo $estado_salida->getEstadoSalida(); ?></td>
				<td><?php echo link_to(image_tag('../images/edit.png'),'administracion/editarEstadoSalida?id_estado_salida='.$estado_salida->getIdEstadoSalida()); ?></td>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'administracion/borrarEstadoSalida?id_estado_salida='.$estado_salida->getIdEstadoSalida(),array('confirm' => '¿Estás seguro?')); ?></td>				
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>

<!-- Tabla de Estado Ventas -->
<?php if($pager_estado_ventas->getnbResults() == 0): ?>
	<table class="tablasEstados">
		<thead>
			<tr><td align="center"><?php echo __("Estado Ventas"); ?></td></tr>
		</thead>
		<tr><td align="center"><?php echo __("No se ha encontrado ningún estado."); ?></td></tr>
	</table>
<?php else: ?>
	<div class='tablasEstados' align='center'>
	   <ul class='paginator'>
	     <?php if ($pager_estado_ventas->haveToPaginate()): ?>
	       <li class='previous'><?php echo link_to('&laquo;', 'administracion/administrarEstados?page_estado_ventas='.$pager_estado_ventas->getFirstPage()); ?></li>
	       <li class='previous'><?php echo link_to('&lt;', 'administracion/administrarEstados?page_estado_ventas='.$pager_estado_ventas->getPreviousPage()); ?></li>
	       <?php $links = $pager_estado_ventas->getLinks(); 
	       foreach ($links as $page_estado_ventas): ?>
	         <?php if($page_estado_ventas == $pager_estado_ventas->getPage()): ?>
	           <li class='current'><?php echo $page_estado_ventas; ?></li>
	         <?php else: ?>
	           <li class='page'><?php echo link_to($page_estado_ventas, 'administracion/administrarEstados?page_estado_ventas='.$page_estado_ventas); ?></li>
	         <?php endif; ?>
	         <?php if ($page_estado_ventas != $pager_estado_ventas->getCurrentMaxLink()): ?><li class='empty'>   <li><?php endif ?>
	       <?php endforeach ?>
	       <li class='next'><?php echo link_to('&gt;', 'administracion/administrarEstados?page_estado_ventas='.$pager_estado_ventas->getNextPage()); ?></li>
	       <li class='next'><?php echo link_to('&raquo;', 'administracion/administrarEstados?page_estado_ventas='.$pager_estado_ventas->getLastPage()); ?></li>
	     <?php endif ?>
	   </ul>
	</div>	
	<table class='tablasEstados'>
		<thead>
			<tr>
				<td colspan='3'><?php echo __("ESTADO VENTAS"); ?></td>
			</tr>			
			<tr>
				<td><?php echo __("Estado"); ?></td>
				<td><?php echo __("Editar"); ?></td>
				<td><?php echo __("Borrar"); ?></td>
			</tr>
		</thead>			
		<?php foreach($pager_estado_ventas->getResults() as $estado_venta): ?>
			<tr>
				<td><?php echo $estado_venta->getEstadoVenta(); ?></td>
				<td><?php echo link_to(image_tag('../images/edit.png'),'administracion/editarEstadoVenta?id_estado_venta='.$estado_venta->getIdEstadoVenta()); ?></td>
				<td><?php echo link_to(image_tag('../images/borrar.png'),'administracion/borrarEstadoVenta?id_estado_venta='.$estado_venta->getIdEstadoVenta(),array('confirm' => '¿Estás seguro?')); ?></td>				
			</tr>					
		<?php endforeach; ?>				
	</table>
<?php endif; ?>