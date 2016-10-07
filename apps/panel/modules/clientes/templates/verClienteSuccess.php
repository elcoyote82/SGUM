<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Clientes'),'/clientes/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Cliente'),'/clientes/agregarCliente'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Clientes'),'/contactos/administrarContactosClientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Contacto'),'/contactos/agregarContacto?opcion=clientes'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("CLIENTE '").$obj_cliente->getNombre()."'"; ?>
</div>
<div id='ficha'>
	<div id="sidebar-tabs">
		<div id="mostPopWidget">
        	<div id="tabsContainer">
        		<ul class="tabs">
        			<li class="selected"><a href='#'><?php echo __("<strong>Cliente</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Contactos</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Últimas Ventas</strong>"); ?></a></li>
        		</ul>
        	</div>
        	<div class="tabContent tabContentActive" id="a">
        		<div class='info_ficha'>
					<?php echo button_to(__('Editar Cliente'),'clientes/editarCliente?id_md5_cliente='.$obj_cliente->getIdMd5Cliente(),array('class'  => 'buttonEsqueleto')); ?>
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'>
        					<tr>
        						<td>
        							<?php echo "<strong>Nombre</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getNombre(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CIF/NIF</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getCifNif(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Dirección</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getDireccion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Población</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getPoblacion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Provincia</strong>"; ?>
        						</td>
        						<td>
        							<?php if($obj_cliente->getProvincia()): ?>
        								<?php echo $ar_provincias[$obj_cliente->getProvincia()]; ?>
        							<?php endif; ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CP</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getCP(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Pais</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getPais(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Teléfono</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getTelefono(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Móvil</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getMovil(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Fax</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getFax(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Email</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getEmail(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Web</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_cliente->getWeb(); ?>
        						</td>
        					</tr>
        				</table>
        			</div> 
        		</div>		
			</div>
			<div class="tabContent" id="b">
				<div class='info_ficha'>	        				
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'>
        					<tr>
					        	<td>
        							<strong><?php echo __("Nombre"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Apellidos"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Teléfono"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Jefe"); ?></strong>
        						</td>        						
        						<td>
        							<strong><?php echo __("Puesto"); ?></strong>
        						</td>
        					</tr>	
        					<?php $ar_contactos_x_cliente = $acc_contactos->obtenerContactosXIdCliente($obj_cliente->getIdCliente()); ?>
        					<?php if($ar_contactos_x_cliente): ?>        						
		     					<?php foreach($ar_contactos_x_cliente as $contactos_x_cliente): ?>
			     					<tr>
			     						<td><?php echo link_to($contactos_x_cliente->getNombre(),'contactos/verContacto?id_md5_contacto='.$contactos_x_cliente->getIdMd5Contacto()); ?></td>
										<td><?php echo $contactos_x_cliente->getApellidos(); ?></td>
										<td><?php echo $contactos_x_cliente->getTelefono(); ?></td>
										<?php $nombre_jefe = $acc_contactos->obtenerNombreJefeXIdJefe($contactos_x_cliente->getIdJefe()); ?>
										<td><?php echo $nombre_jefe; ?></td>
										<td><?php echo $contactos_x_cliente->getPuesto(); ?></td>
									</tr>
		     					<?php endforeach; ?>		     						
		     				<?php else: ?>
		     					<tr>
		     						<td align='center' colspan = '5'><?php echo __("No hay ningún contacto para este cliente."); ?></td>
		     					</tr>
		     				<?php endif; ?>	
        				</table>
        			</div>
        		</div>
        	</div>
			<div class="tabContent" id="c">
				<div class='info_ficha'>	        				
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'>	
        					<tr>
        						<td>
        							<strong><?php echo __("Num Venta"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Estado Venta"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Fecha venta"); ?></strong>
        						</td>
        						<td colspan='3'>
        							<strong><?php echo __("Acciones"); ?></strong>
        						</td>
        					</tr>				        		
        					<?php $ar_ventas_x_cliente = $acc_ventas->obtenerVentasXIdCliente($obj_cliente->getIdCliente()); ?>
        					<?php if($ar_ventas_x_cliente): ?>
	        					<?php foreach($ar_ventas_x_cliente as $obj_ventas_x_cliente): ?>
	        						<tr>		        						
										<td><?php echo $obj_ventas_x_cliente->getNumVenta(); ?></td>
		        						<?php $id_estado_venta = $obj_ventas_x_cliente->getIdEstadoVenta();?>
		        						<?php $obj_estado_venta = $acc_admin->obtenerObjEstadoVenta($id_estado_venta); ?>		        						
										<td><?php echo $obj_estado_venta->getEstadoVenta(); ?></td>
										<td><?php echo $obj_ventas_x_cliente->getCreatedAt(); ?></td>				
										<?php if($id_estado_venta == 1): ?>
											<td><?php echo link_to(image_tag('../images/borrar.png'),'/ventas/borrarVenta?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), array('confirm' => '¿Est&aacute;s seguro?','title' => 'Cancelar venta')); ?></td>
											<td><?php echo link_to(image_tag('../images/edit.png'),'/ventas/editarVenta?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), 'title=Editar venta'); ?></td>
											<td><?php echo link_to(image_tag('../images/ok.png'),'/ventas/confirmarVenta?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), 'title=Confirmar venta'); ?></td>								
										<?php elseif($id_estado_venta == 2): ?>
											<td><?php echo link_to(image_tag('../images/lupa.png'),'/ventas/verVenta?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), 'title=Ver venta'); ?></td>
											<td><?php echo link_to(image_tag('../images/pdf2.png'),'/ventas/descargarInformeVenta?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), 'title=Descargar informe'); ?></td>
											<td><?php echo link_to(image_tag('../images/right.png'),'/ventas/confirmarVentaEnviada?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), array('confirm' => 'La venta se va a enviar al almacén. ¿Confirmar?','title=Confirmar Venta Enviada')); ?></td>								
										<?php elseif($id_estado_venta == 3): ?>
											<td><?php echo link_to(image_tag('../images/lupa.png'),'/ventas/verVenta?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), 'title=Ver venta'); ?></td>
											<td><?php echo link_to(image_tag('../images/pdf2.png'),'/ventas/descargarInformeVenta?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), 'title=Descargar informe'); ?></td>								
											<td><?php echo link_to(image_tag('../images/ojo'),'/ventas/comprobarVentaCompleta?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), 'title=Comprobar Venta Completa'); ?></td>
										<?php else:?>
											<td><?php echo link_to(image_tag('../images/lupa.png'),'/ventas/verVentaCompleta?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), 'title=Ver venta'); ?></td>
											<td></td>
											<td><?php echo link_to(image_tag('../images/pdf2.png'),'/ventas/descargarInformeVenta?id_md5_venta='.$obj_ventas_x_cliente->getIdMd5Venta(), 'title=Descargar informe'); ?></td>							
										<?php endif;?>
	        						</tr>
	        					<?php endforeach; ?>		     						
		     				<?php else: ?>
		     					<tr>
		     						<td align='center' colspan = '5'><?php echo __("No hay ninguna venta para este cliente."); ?></td>
		     					</tr>
		     				<?php endif; ?>				
        				</table>
        			</div> 
        		</div>
			</div>
		</div>
	</div>
</div>