<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Administrar Entradas'),'/entradas/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Entradas Pendientes'),'/entradas/entradasPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Entradas Procesadas'),'/entradas/entradasProcesadas'); ?></div>	
</div>
<div id="tituloTabla">
  <?php echo __("Procesando Entrada '").$obj_entrada->getNumEntrada()."' | ".$acc_fechas->cambiarFormatoFecha14($obj_entrada->getUpdatedAt())." | ". __("Pedido '").$obj_pedido->getNumPedido()."' | ".$acc_fechas->cambiarFormatoFecha14($obj_pedido->getUpdatedAt()); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/entradas/procesarEntrada'); ?>
		<div id='ficha'>
			<div class='info_ficha'>
				<div class='ficha_procesar_entrada'>
					<table class='tabla_ficha'>
			        	<thead>
			        		<td colspan='2'><?php echo __("Datos Proveedor");?>
		        		</thead>
		        		<tr>
		        			<td>
		        				<?php echo "<strong>Nombre</strong>"; ?>
		        			</td>
		        			<td>
		        				<?php echo $obj_proveedor->getNombre(); ?>
		        			</td>
		        		</tr>
						<tr>
							<td>
								<?php echo "<strong>CIF/NIF</strong>"; ?>
							</td>
							<td>
								<?php echo $obj_proveedor->getCifNif(); ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "<strong>Dirección</strong>"; ?>
							</td>
							<td>
								<?php echo $obj_proveedor->getDireccion(); ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "<strong>Población</strong>"; ?>
							</td>
							<td>
								<?php echo $obj_proveedor->getPoblacion(); ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "<strong>Provincia</strong>"; ?>
							</td>
							<td>
								<?php if($obj_proveedor->getProvincia()): ?>
									<?php echo $ar_provincias[$obj_proveedor->getProvincia()]; ?>
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "<strong>CP</strong>"; ?>
							</td>
							<td>
								<?php echo $obj_proveedor->getCP(); ?>
							</td>
						</tr>
		        		<tr>
							<td>
								<?php echo "<strong>Pais</strong>"; ?>
							</td>
							<td>
								<?php echo format_country($obj_proveedor->getPais()); ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "<strong>Teléfono</strong>"; ?>
							</td>
							<td>
								<?php echo $obj_proveedor->getTelefono(); ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "<strong>Móvil</strong>"; ?>
							</td>
							<td>
								<?php echo $obj_proveedor->getMovil(); ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "<strong>Fax</strong>"; ?>
							</td>
							<td>
								<?php echo $obj_proveedor->getFax(); ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "<strong>Email</strong>"; ?>
							</td>
							<td>
								<?php echo $obj_proveedor->getEmail(); ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo "<strong>Web</strong>"; ?>
							</td>
							<td>
								<?php echo $obj_proveedor->getWeb(); ?>
							</td>
						</tr>
					</table>
				</div>
				<div class='ficha_procesar_entrada'>
					<table class='tabla_ficha'>
		        		<thead>
		        			<td colspan='2'><?php echo __("Datos Conductor");?>
		        		</thead>
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
				<div class='ficha_procesar_entrada'>
					<table class='tabla_ficha'>
		        		<thead>
		        			<td colspan='2'><?php echo __("Datos Empresa");?>
		        		</thead>
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
        						<?php echo link_to($obj_transporte_empresa->getWeb(),"http://".$obj_transporte_empresa->getWeb(),'target=_blank'); ?>
        					</td>
        				</tr>
					</table>
				</div>
			</div>
		</div>
		<div id="tituloTabla" >
			<?php echo __("LISTA DE ARTÍCULOS"); ?>
		</div>
		<table id="lista_elementos" class='centrarTablas'>
			<thead>
				<tr>					
					<td></td>
					<td><?php echo __("Nombre"); ?></td>
					<td><?php echo __("Familia"); ?></td>
					<td><?php echo __("Datos"); ?></td>
					<td><?php echo __("Lote"); ?></td>
					<td><?php echo __("Ubicación"); ?></td>
				</tr>
			</thead>
			<tbody>
				<div class='form_error'><?php if($error_lotes) : echo $msg_error_lotes; endif; ?></div>
				<div class='form_error'><?php if($error_lotes2) : echo $msg_error_lotes2; endif; ?></div>
				<div class='form_error'><?php if($error_ubicaciones) : echo $msg_error_ubicaciones; endif; ?></div>
				<?php if($ar_lineas_entrada): ?>
					<?php foreach($ar_lineas_entrada as $linea_entrada): ?>
						<tr>
							<?php $articulo = $acc_articulos->obtenerObjArticulo($linea_entrada->getIdArticulo()); ?>
							<?php if ($articulo->getImagen() != ''): ?>
								<?php $imagen_tam = getimagesize(sfConfig::get('app_imagen_articulos').'/'.$articulo->getImagen()); ?>
								<td align="center" style="padding:5px;"><?php echo link_to(image_tag('articulos/'.$articulo->getImagen(),array('size' => '50x'.($imagen_tam[1]*50)/$imagen_tam[0])),'articulos/verArticulo?id_md5_articulo='.$articulo->getIdMd5Articulo()); ?></td>
							<?php else: ?>
								<td align="center" style="padding:5px;"><?php echo link_to(image_tag('no_image.jpg',array('size' => '50x50')),'articulos/verArticulo?id_md5_articulo='.$articulo->getIdMd5Articulo()); ?></td>
							<?php endif; ?>			
							<td><?php echo $articulo->getNombre(); ?></td>
							<?php $obj_familia = $acc_familias->obtenerObjFamilia($articulo->getIdFamilia()); ?>
							<?php $nombre_familia = $obj_familia->getNombre(); ?>
							<td><?php echo $nombre_familia; ?></td>
							<td><?php echo $articulo->getDatosProducto(); ?></td>
							<td><?php echo input_tag('lote['.$linea_entrada->getIdArticuloXEntrada().']',$ar_lotes[$linea_entrada->getIdArticuloXEntrada()]); ?></td>
							<td><?php echo select_tag('id_ubicacion['.$linea_entrada->getIdArticuloXEntrada().']',options_for_select($ar_ubicaciones,$ar_id_ubicacion[$linea_entrada->getIdArticuloXEntrada()])); ?></td>								
						</tr>		
		 	 		<?php endforeach; ?>
				<?php else: ?>
					<tr><td colspan='5' align="center"><?php echo __("No hay artículos que procesar."); ?></td></tr>
				<?php endif; ?>
			</tbody>
		</table>
		<?php echo input_hidden_tag('id_md5_entrada',$id_md5_entrada);?>
		<?php echo input_hidden_tag('id_md5_pedido',$id_md5_pedido);?>
		<?php echo input_hidden_tag('procesar',true);?>
		<?php echo button_to(__('Cancelar'),'/entradas/index',array('class' => 'buttonEsqueleto2')); ?>
		<?php echo submit_tag(__('Procesar'),array('class' => 'buttonEsqueleto2')) ?>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td><?php echo __("Entrada Procesada"); ?></td>
			</tr>
		</thead>
		<tr><td align='center'><?php echo $msg; ?></td></tr>
		<tr>
			<td align='center'><?php echo button_to(__('Volver'),'/entradas/index',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>