<div id="subnavegacion">
	<div class='botonSubNav'><?php echo link_to(__('Inicio'),'/ayuda/index'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Administración'),'/ayuda/administracion'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Articulos'),'/ayuda/articulos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Proveedores'),'/ayuda/proveedores'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Pedidos'),'/ayuda/pedidos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Entradas'),'/ayuda/entradas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Clientes'),'/ayuda/clientes'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Ventas'),'/ayuda/ventas'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Salidas'),'/ayuda/salidas'); ?></div>	
	<div class='botonSubNav'><?php echo link_to(__('Transporte'),'/ayuda/transporte'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Contactos'),'/ayuda/contactos'); ?></div>
	<div class='botonSubNav'><?php echo link_to(__('Informes'),'/ayuda/informes'); ?></div>
</div>
<div id="tituloAyuda" >
	<?php echo __("AYUDA MÓDULO VENTAS"); ?>
</div>
<div id="textoLateralAyuda">	
	<ul>
		<li><strong><?php echo __("Ventas")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Administrar Ventas"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/administrarVentas',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ventas Pendientes"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/ventasPendientes',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ventas En Proceso"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/ventasEnProceso',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ventas Enviadas"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/ventasEnviadas',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ventas Completas"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/ventasCompletas',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ventas Procesadas"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/ventasProcesadas',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Ventas"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorVentas',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Agregar Venta"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/agregarVenta',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ficha Venta"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaVenta',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<ul>
				<li>
					<?php echo link_to_remote(__("Informe Venta"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaVenta_InformeVenta',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
			</ul>			
			<li><?php echo link_to_remote(__("Ficha Venta Completa"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaVentaCompleta',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<ul>
				<li><?php echo link_to_remote(__("Informe Venta"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaVentaCompleta_InformeVenta',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
				<li><?php echo link_to_remote(__("Datos Salida"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaVentaCompleta_DatosSalida',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
				<li><?php echo link_to_remote(__("Informe Salida"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaVentaCompleta_InformeSalida',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
			</ul>
	</ul>
</div>
<div id="textoLateralAyuda2">
	<div id="textoDefaultAyuda"><?php echo __("En el menú lateral te mostramos las opciones de ayuda que puedes escoger."); ?></div>
</div>