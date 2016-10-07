<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Volver'),'/articulos/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ubicaciones'),'/ubicaciones/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Agregar Ubicación'),'/ubicaciones/agregarUbicacion'); ?></div>
</div>
<?php if (!isset($msg)): ?>
	<div id="tituloTabla" >
		<?php echo __("VER UBICACIÓN '".$obj_ubicacion->getNombre()."'"); ?>
	</div>
	<div id='ficha'>
		<div id="sidebar-tabs">
			<div id="mostPopWidget">
	        	<div id="tabsContainer">
	        		<ul class="tabs">
	        			<li class="selected"><a href='#'><?php echo __("<strong>Ubicación</strong>"); ?></a></li>
	        		</ul>
	        	</div>
        		<div class='info_ficha'>
        			<div style="float:left; margin-bottom:20px; align:center; ">
	        			<?php $obj_estado_ubicacion = $acc_administracion->obtenerObjEstadoUbicacion($obj_ubicacion->getIdEstadoUbicacion()); ?>
        					<strong><?php echo __("Capacidad de la ubicación"); ?></strong>
	        			<?php if($obj_estado_ubicacion->getEstadoUbicacion() == 0): ?>
        						<?php echo __("Libre"); ?>
        					<?php elseif($obj_estado_ubicacion->getEstadoUbicacion() == 100): ?>
        						<?php echo __("Completo"); ?>
        					<?php else: ?>
        						<?php echo $obj_estado_ubicacion->getEstadoUbicacion()." %"; ?>
        					<?php endif; ?>
        					<br />
        					<?php echo $acc_utilidades->obtenerTablaCapacidadXEstadoUbicacion($obj_estado_ubicacion->getEstadoUbicacion());?>
					</div>	
        			<div class='ficha_datos'>
        				<table class='tabla_ficha'>
        					<tr>
        						<td>
        							<strong><?php echo __("Ubicación"); ?></strong>
        						</td>
        						<td>
        							<?php echo $obj_ubicacion->getNombre(); ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<strong><?php echo __("Estado"); ?></strong>
        						</td>
        						<td>
        							<?php $obj_estado_ubicacion = $acc_administracion->obtenerObjEstadoUbicacion($obj_ubicacion->getIdEstadoUbicacion()); ?>
        							<?php if($obj_estado_ubicacion->getEstadoUbicacion() == 0): ?>
        								<?php echo "Libre"; ?>
        							<?php elseif($obj_estado_ubicacion->getEstadoUbicacion() == 100): ?>
        								<?php echo "Completo"; ?>
        							<?php else: ?>
        								<?php echo $obj_estado_ubicacion->getEstadoUbicacion()." %"; ?>
        							<?php endif; ?>
        						</td>
        					</tr>
        					<tr>
        						<td>
        							<strong><?php echo __("Artículo"); ?></strong>
        						</td>
        						<td>
        							<strong><?php echo __("Lote"); ?></strong>
        						</td>
        					</tr>	        					
							<?php $ar_articulos_x_ubicacion = $acc_ubicaciones->obtenerArticulosXIdUbicacion($obj_ubicacion->getIdUbicacion()); ?>				       
					        <?php if($ar_articulos_x_ubicacion): ?>
								<?php foreach ($ar_articulos_x_ubicacion as $articulos_x_ubicacion): ?>
									<?php $obj_articulo = $acc_articulos->obtenerObjArticulo($articulos_x_ubicacion->getIdArticulo());?>
									<tr>
										<td><?php echo link_to($obj_articulo->getNombre(),'articulos/verArticulo?id_md5_articulo='.$obj_articulo->getIdMd5Articulo()); ?></td>											
										<td><?php echo $articulos_x_ubicacion->getLote(); ?></td>
									</tr>
								<?php endforeach;?>
							<?php endif; ?>
        				</table>
        			</div> 
	        	</div>		
			</div>
		</div>
	</div>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td colspan='2'><?php echo __("VER UBICACIÓN"); ?></td>
			</tr>
		</thead>
		<tr><td align='center' colspan='2'><?php echo $msg; ?></td></tr>
		<tr>
			<td><?php echo button_to('Volver','ubicaciones/index',array('class' => 'buttonEsqueleto2')); ?></td></tr>
	</table>
<?php endif; ?>