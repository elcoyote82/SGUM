<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Informes Pedidos'),'/informes/informesPedidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Informes Entradas'),'/informes/informesEntradas'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Informes Ventas'),'/informes/informesVentas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Informes Salidas'),'/informes/informesSalidas'); ?></div>	
</div>
<div id="tituloTabla" >
	<?php echo __("INFORMES PEDIDOS"); ?>
</div>
<div id='ficha'>
	<div class='info_ficha'>	        				
		<div class='ficha_informe_pedidos'>
			<iframe src='<?php echo $ruta_informe_pedido ?>' style='width:940px;height:660px;border:none;'></iframe>;        			
		</div>
	</div>
</div>