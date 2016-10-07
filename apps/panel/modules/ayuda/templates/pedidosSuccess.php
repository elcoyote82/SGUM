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
	<?php echo __("AYUDA MÓDULO PEDIDOS"); ?>
</div>
<div id="textoLateralAyuda">	
	<ul>
		<li><strong><?php echo __("Pedidos")?></strong></li>
		<ul>
			<li><?php echo link_to_remote(__("Administrar Pedidos"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/administrarPedidos',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Pedidos Pendientes"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/pedidosPendientes',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Pedidos En Proceso"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/pedidosEnProceso',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Pedidos Recibidos"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/pedidosRecibidos',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Pedidos Completos"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/pedidosCompletos',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Pedidos Procesados"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/pedidosProcesados',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Buscador de Pedidos"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/buscadorPedidos',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Agregar Pedido"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/agregarPedido',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<li><?php echo link_to_remote(__("Ficha Pedido"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaPedido',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<ul>
				<li>
					<?php echo link_to_remote(__("Informe Pedido"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaPedido_InformePedido',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
			</ul>			
			<li><?php echo link_to_remote(__("Ficha Pedido Completo"), array(
					'update'	=> 'textoLateralAyuda2',
					'url'		=> 'ayuda/fichaPedidoCompleto',
					'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
			</li>
			<ul>
				<li><?php echo link_to_remote(__("Informe Pedido"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaPedidoCompleto_InformePedido',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
				<li><?php echo link_to_remote(__("Datos Entrada"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaPedidoCompleto_DatosEntrada',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
				<li><?php echo link_to_remote(__("Informe Entrada"), array(
						'update'	=> 'textoLateralAyuda2',
						'url'		=> 'ayuda/fichaPedidoCompleto_InformeEntrada',
						'complete'	=>  visual_effect('BlindDown', 'textoLateralAyuda2').visual_effect('highlight', 'textoLateralAyuda2'))) ?>
				</li>
			</ul>
	</ul>
</div>
<div id="textoLateralAyuda2">
	<div id="textoDefaultAyuda"><?php echo __("En el menú lateral te mostramos las opciones de ayuda que puedes escoger."); ?></div>
</div>