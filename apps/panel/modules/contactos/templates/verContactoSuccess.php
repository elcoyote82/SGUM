<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Contactos'),'/contactos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Proveedores'),'/contactos/administrarContactosProveedores'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos Clientes'),'/contactos/administrarContactosClientes'); ?></div>
</div>
<div id="tituloTabla" >
	<?php if ($obj_contacto->getOpcion() == '0'): ?>
		<?php echo __("Contacto '").$obj_contacto->getNombre()." ".$obj_contacto->getApellidos().__("' del Proveedor '").$acc_contactos->obtenerNombreProveedorXIdContactado($obj_contacto->getIdContactado())."'"; ?>
	<?php else: ?>
		<?php echo __("Contacto '").$obj_contacto->getNombre()." ".$obj_contacto->getApellidos().__("' del Cliente '").$acc_contactos->obtenerNombreClienteXIdContactado($obj_contacto->getIdContactado())."'"; ?>
	<?php endif; ?>
</div>
<div id='ficha'>
	<div id="sidebar-tabs">
		<div id="mostPopWidget">
        	<div id="tabsContainer">
        		<ul class="tabs">
        			<li class="selected"><a href='#'><?php echo __("<strong>Contacto</strong>"); ?></a></li>
        			<li><a href='#'>
        				<?php if ($obj_contacto->getOpcion() == '0'): ?>
        					<?php echo __("<strong>Proveedor</strong>"); ?>
        				<?php else: ?>
        					<?php echo __("<strong>Cliente</strong>"); ?>
        				<?php endif; ?>			
        			</a></li>					
        		</ul>
        	</div>
        	<div class="tabContent tabContentActive" id="a">
        		<div class='info_ficha'>
        		<?php if($obj_contacto->getOpcion() == '0'): ?>
					<?php echo button_to(__('Editar Contacto'),'contactos/editarContacto?id_md5_contacto='.$obj_contacto->getIdMd5Contacto().'&opcion=proveedores',array('class'  => 'buttonEsqueleto')); ?>
				<?php else: ?>
					<?php echo button_to(__('Editar Contacto'),'contactos/editarContacto?id_md5_contacto='.$obj_contacto->getIdMd5Contacto().'&opcion=clientes',array('class'  => 'buttonEsqueleto')); ?>
				<?php endif; ?>
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'>
        					<tr>
        						<td>
        							<?php echo "<strong>Nombre</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getNombre(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Apellidos</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getApellidos(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Dirección</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getDireccion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CP</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getCP(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Localidad</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getLocalidad(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Provincia</strong>"; ?>
        						</td>
        						<td>        							
        							<?php if($obj_contacto->getProvincia()): ?>
        								<?php echo $ar_provincias[$obj_contacto->getProvincia()]; ?>
        							<?php endif; ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Pais</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getPais(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Teléfono</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getTelefono(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Móvil</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getMovil(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Fax</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getFax(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Email</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getEmail(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Puesto</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getPuesto(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Observaciones</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contacto->getObservaciones(); ?>
        						</td>
        					</tr>
        				</table>
        			</div> 
        		</div>		
			</div>
			<?php if($obj_contacto->getOpcion() == '0'): ?>
				<?php $obj_contactado = $acc_proveedores->obtenerObjProveedor($obj_contacto->getIdContactado()); ?>
			<?php else: ?>
				<?php $obj_contactado = $acc_clientes->obtenerObjCliente($obj_contacto->getIdContactado()); ?>
			<?php endif; ?>
			<div class="tabContent" id="b">
				<div class='info_ficha'>
					<?php if($obj_contacto->getOpcion() == '0'): ?>
						<?php echo button_to(__('Editar Proveedor'),'proveedores/editarProveedor?id_md5_proveedor='.$obj_contactado->getIdMd5Proveedor(),array('class'  => 'buttonEsqueleto')); ?>
					<?php else: ?>
						<?php echo button_to(__('Editar Cliente'),'clientes/editarCliente?id_md5_cliente='.$obj_contactado->getIdMd5Cliente(),array('class'  => 'buttonEsqueleto')); ?>
					<?php endif; ?>					
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'>
        					<tr>
        						<td>
        							<?php echo "<strong>Nombre</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getNombre(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CIF/NIF</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getCifNif(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Dirección</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getDireccion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Población</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getPoblacion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Provincia</strong>"; ?>
        						</td>
        						<td>
        							<?php if($obj_contactado->getProvincia()): ?>
        								<?php echo $ar_provincias[$obj_contactado->getProvincia()]; ?>
        							<?php endif; ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CP</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getCP(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Pais</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getPais(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Teléfono</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getTelefono(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Móvil</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getMovil(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Fax</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getFax(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Email</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getEmail(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Web</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_contactado->getWeb(); ?>
        						</td>
        					</tr>
        				</table>
        			</div> 
        		</div>
			</div>
		</div>
	</div>
</div>