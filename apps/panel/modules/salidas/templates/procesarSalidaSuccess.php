<!-- para marcar todos los emails --> 
<?php echo javascript_tag("
  function seleccionar_todo(form)  
{    
	for(i=0; i<form.elements.length; i++){
		 if((form.elements[i].type== \"checkbox\")&&(form.check_all.checked == true))
	     {
	     	form.elements[i].checked=true;
	     }
	     else
	     {
	     	form.elements[i].checked=false;	     
	     }
	}   
}
") ?>
<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Administrar Salidas'),'/salidas/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Salidas Pendientes'),'/salidas/salidasPendientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Salidas Procesadas'),'/salidas/salidasProcesadas'); ?></div>	
</div>
<div id="tituloTabla">
  <?php echo __("Procesando Salida '").$obj_salida->getNumSalida()."' | ".$acc_fechas->cambiarFormatoFecha14($obj_salida->getUpdatedAt())." | ". __("Venta '").$obj_venta->getNumVenta()."' | ".$acc_fechas->cambiarFormatoFecha14($obj_venta->getUpdatedAt()); ?>
</div>
<?php if(!isset($msg)): ?>
	<?php echo form_tag('/salidas/procesarSalida'); ?>
		<div id='ficha'>
			<div class='info_ficha'>
				<div class='ficha_procesar_salida'>
					<table class='tabla_ficha'>
			        	<thead>
			        		<td colspan='2'><?php echo __("Datos Cliente");?>
		        		</thead>
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
								<?php echo format_country($obj_cliente->getPais()); ?>
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
				<div class='ficha_procesar_salida'>
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
				<div class='ficha_procesar_salida'>
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
					<td width='15' align='center'>
						<?php echo checkbox_tag('check_all', 1,0,array('onclick' => 'seleccionar_todo(this.form)'));?>
					</td>	
				</tr>
			</thead>
			<tbody>
				<?php if($ar_lineas_salida): ?>
					<?php foreach($ar_lineas_salida as $linea_salida): ?>
						<tr>
							<?php $articulo = $acc_articulos->obtenerObjArticulo($linea_salida->getIdArticulo()); ?>
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
							<td><?php echo $linea_salida->getLote(); ?></td>
							<td><?php echo $acc_ubicaciones->obtenerNombreUbicacionXIdUbicacion($linea_salida->getIdUbicacion()); ?></td>
							<td><?php echo checkbox_tag('id_linea_salida_cargada['.$linea_salida->getIdArticuloXSalida().']',$linea_salida->getIdArticuloXSalida(),isset($ar_lineas_salida_cargadas[$linea_salida->getIdArticuloXSalida()])) ?></td>								
						</tr>		
		 	 		<?php endforeach; ?>
				<?php else: ?>
					<tr><td colspan='5' align="center"><?php echo __("No hay artículos que procesar."); ?></td></tr>
				<?php endif; ?>
			</tbody>
		</table>
		<?php echo input_hidden_tag('id_md5_salida',$id_md5_salida);?>
		<?php echo input_hidden_tag('id_md5_venta',$id_md5_venta);?>
		<?php echo input_hidden_tag('procesar',true);?>
		<?php echo button_to(__('Cancelar'),'/salidas/index',array('class' => 'buttonEsqueleto2')); ?>
		<?php echo submit_tag(__('Procesar'),array('class' => 'buttonEsqueleto2')) ?>
	</form>
<?php else: ?>
	<table class='centrarTablas'>
		<thead>
			<tr>
				<td><?php echo __("Salida Procesada"); ?></td>
			</tr>
		</thead>
		<tr><td align='center'><?php echo $msg; ?></td></tr>
		<tr>
			<td align='center'><?php echo button_to(__('Volver'),'/salidas/index',array('class' => 'buttonEsqueleto2')); ?></td>
		</tr>
	</table>
<?php endif; ?>