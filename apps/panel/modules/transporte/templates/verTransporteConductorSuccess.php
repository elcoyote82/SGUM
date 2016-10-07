<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Conductores'),'/transporte/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Conductor'),'/transporte/agregarTransporteConductor'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Empresas de Transporte'),'/transporte/administrarTransporteEmpresas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Empresa'),'/transporte/agregarTransporteEmpresa'); ?></div>
</div>
<div id="tituloTabla" >
	<?php echo __("CONDUCTOR '").$obj_transporte_conductor->getNombre()." ".$obj_transporte_conductor->getApellidos()."'"; ?>
</div>
<div id='ficha'>
	<div id="sidebar-tabs">
		<div id="mostPopWidget">
        	<div id="tabsContainer">
        		<ul class="tabs">
        			<li class="selected"><a href='#'><?php echo __("<strong>Conductor</strong>"); ?></a></li>
        			<li><a href='#'><?php echo __("<strong>Empresa de Transporte</strong>"); ?></a></li>
        		</ul>
        	</div>
        	<div class="tabContent tabContentActive" id="a">
        		<div class='info_ficha'>
					<?php echo button_to(__('Editar Conductor'),'transporte/editarTransporteConductor?id_md5_transporte_conductor='.$obj_transporte_conductor->getIdMd5TransporteConductor(),array('class'  => 'buttonEsqueleto')); ?>
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'>
        					<tr>
        						<td>
        							<?php echo "<strong>Nombre</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_conductor->getNombre(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Apellidos</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_conductor->getApellidos(); ?>
        						</td>
        					</tr>
        					<?php $obj_transporte_empresa = $acc_transporte->obtenerObjTransporteEmpresa($obj_transporte_conductor->getIdTransporteEmpresa()); ?>
        					<?php if($obj_transporte_empresa): ?>
								<?php $nombre_empresa = $obj_transporte_empresa->getNombre(); ?>
								<?php $id_md5_transporte_empresa = $obj_transporte_empresa->getIdMd5TransporteEmpresa();?>
							<?php else: ?>
								<?php $nombre_empresa = ''; ?>
							<?php endif; ?>
        					<tr>
        						<td>
        							<?php echo "<strong>Empresa</strong>"; ?>
        						</td>
        						<td>
	        						<?php echo link_to($nombre_empresa,'transporte/verTransporteEmpresa?id_md5_transporte_empresa='.$id_md5_transporte_empresa); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Teléfono</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_conductor->getTelefono(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Móvil</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_conductor->getMovil(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Observaciones</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_conductor->getObservaciones(); ?>
        						</td>
        					</tr>
        				</table>
        			</div> 
        		</div>		
			</div>			
        	<div class="tabContent" id="b">
        		<div class='info_ficha'>
					<?php echo button_to(__('Editar Empresa'),'transporte/editarTransporteEmpresa?id_md5_transporte_empresa='.$obj_transporte_empresa->getIdMd5TransporteEmpresa(),array('class'  => 'buttonEsqueleto')); ?>
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'>
        					<tr>
        						<td>
        							<?php echo "<strong>Nombre</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getNombre(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CIF/NIF</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getCifNif(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Dirección</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getDireccion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Población</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getPoblacion(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Provincia</strong>"; ?>
        						</td>
        						<td>
        							<?php if($obj_transporte_empresa->getProvincia()):	?>
        								<?php echo $ar_provincias[$obj_transporte_empresa->getProvincia()]; ?>
        							<?php else: ?>
        								<?php echo "";?>
        							<?php endif; ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>CP</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getCP(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Pais</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getPais(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Teléfono</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getTelefono(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Móvil</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getMovil(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Fax</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getFax(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Email</strong>"; ?>
        						</td>
        						<td>
        							<?php echo $obj_transporte_empresa->getEmail(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<?php echo "<strong>Web</strong>"; ?>
        						</td>
        						<td>
        							<?php echo link_to($obj_transporte_empresa->getWeb(),$obj_transporte_empresa->getWeb(),'target=_blank'); ?>
        						</td>
        					</tr>
        				</table>
        			</div> 
        		</div>		
			</div>
		</div>
	</div>
</div>